<?php
	namespace Podcast;
	use c;
	use header;
	use getID3;
	use \Kirby\Toolkit\Xml;


	$kirby->response()->type('rss');

	require_once(__DIR__ . './../plugins/lib/getid3/getid3.php');
	require_once(__DIR__ . './../plugins/lib/helper.php');
	$getID3 = new getID3;
	header::type('text/xml');

	$helper       = new PodcastHelper();
	$trackingDate = date('Y-m');
	$helper->increaseDownloads($page, $trackingDate);

	$atomLink = $page->url();
	if(c::get('plugin.podcast.atom.link', false)) {
		$atomLink = c::get('plugin.podcast.atom.link');
	}

?>
<?php echo '<?xml version="1.0" encoding="utf-8"?>' . PHP_EOL; ?>
<rss version="2.0"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
	xmlns:psc="http://podlove.org/simple-chapters"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
	xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd"
	xmlns:googleplay="http://www.google.com/schemas/play-podcasts/1.0"
	xmlns:media="http://search.yahoo.com/mrss/">
	<channel>
		<title><?php echo Xml::encode($page->title()) ?></title>
		<link><?php echo Xml::encode($page->parent()->url())?></link>

		<description><?php echo Xml::encode($page->description()) ?></description>

		<atom:link href="<?php echo Xml::encode($atomLink) ?>" rel="self" type="application/rss+xml" title="<?php echo Xml::encode($page->title()) ?>"/>

		<lastBuildDate><?php echo date('r', $page->modified()); ?></lastBuildDate>
		<language><?php echo Xml::encode($page->language()); ?></language>
		<generator>Kirby Podcast Plugin</generator>

		<itunes:author><?php echo Xml::encode($page->itunesAuthor()); ?></itunes:author>
		<itunes:summary><?php echo Xml::encode($page->description()); ?></itunes:summary>
		<itunes:owner>
			<itunes:name><?php echo Xml::encode($page->itunesOwner()); ?></itunes:name>
			<itunes:email><?php echo Xml::encode($page->itunesEmail()); ?></itunes:email>
		</itunes:owner>

		<?php if($page->Itunesimage()->isNotEmpty()): ?>
		<itunes:image href="<?php echo Xml::encode($page->image($page->Itunesimage())); ?>"/>
		<?php endif; ?>

		<itunes:subtitle><?php echo Xml::encode($page->itunesSubtitle()); ?></itunes:subtitle>
		<itunes:keywords><?php echo Xml::encode($page->itunesKeywords()); ?></itunes:keywords>
		<itunes:block><?php echo ($page->itunesBlock()->isTrue()) ? 'yes' : 'no'; ?></itunes:block>
		<itunes:explicit><?php echo ($page->itunesExplicit()->isTrue()) ? 'yes' : 'no'; ?></itunes:explicit>
		<itunes:type><?php echo Xml::encode($page->itunesType()); ?></itunes:type>
		<?php
			foreach ($page->itunesCategories()->itunes() as $key => $mainCategory) {
				if(is_array($mainCategory)) {
					echo '<itunes:category text="'.$key.'">';
					foreach ($mainCategory as $subCategory) {
						echo '<itunes:category text="'.$subCategory.'"/>';
					}
					echo '</itunes:category>';
				} else {
					echo '<itunes:category text="'.$mainCategory.'"/>';
				}
			}
		?>
		<?php $episodes = $page->parent()->children()->listed()->flip()->filter(function ($child) {
			return $child->date()->toDate() <= time();
		  });
		?>


		<?php foreach($episodes as $episode): ?>
		<item>
			<title><?php echo Xml::encode($episode->title()); ?></title>
			<link><?php echo Xml::encode($episode->url()); ?></link>
			<guid isPermaLink="false"><?php echo Xml::encode($episode->id()); ?></guid>
			<pubDate><?php echo date('r', $episode->date()->toDate()); ?></pubDate>
			<description><![CDATA[<?php echo $episode->poddescr()->kirbytext() ?>]]></description>
			<atom:link  href="<?php echo Xml::encode($episode->url()); ?>"/>
			
			
			 <?php if($episode->isOldPodcast()->bool()): ?>
				<?php $duration = $episode->Duration(); ?>
				<?php $audioUrl = $episode->PodcastLink(); ?>
				<enclosure url="<?php echo $audioUrl ?>" length="<?php echo '' ?>" type="<?php echo 'audio/mpeg' ?>"/>
			<?php else: ?>
				<?php foreach($episode->audio() as $audio): ?>
					<?php
						$duration = $audio->duration();

						// check if length information is already written to meta-file
						// if not, write the information
						if($audio->duration()->empty()) {
							$path				= $audio->root();
							$mixinfo			= $getID3->analyze($path);
							// $duration			= $mixinfo['playtime_string'];
							list($mins , $secs)	= explode(':' , $duration);

							$hours = 0;
							if($mins > 60) {
								$hours	= intval($mins / 60);
								$mins	= $mins - $hours*60;
							}

							$duration = sprintf("%02d:%02d:%02d" , $hours , $mins , $secs);

							// Update file info, so we don't have to determine the duration again
							$audio->update(array(
								'duration' => $duration
							));
						}
						$podtrac = "https://dts.podtrac.com/redirect.mp3/";
						$audioUrl = $podtrac . $episode->url().'/'.$audio->filename();
					?>
					
					<enclosure url="<?php echo $audioUrl ?>" length="<?php echo $audio->size() ?>" type="<?php echo $audio->mime() ?>"/>
				<?php endforeach; ?>
			
			<?php endif ?>
			<itunes:duration><?php echo $duration; ?></itunes:duration>

			<itunes:author><?php echo Xml::encode($episode->author()->or($page->itunesAuthor())); ?></itunes:author>
			<itunes:subtitle><?php echo Xml::encode($episode->podsubtitle()); ?></itunes:subtitle>
			<itunes:summary><?php echo Xml::encode($episode->podsubtitle()); ?></itunes:summary>

			<?php if($episode->podseason()->isNotEmpty()): ?><itunes:season><?php echo Xml::encode($episode->podseason()); ?></itunes:season><?php endif; ?>
			<?php if($episode->podepisode()->isNotEmpty()): ?><itunes:episode><?php echo Xml::encode($episode->podepisode()); ?></itunes:episode><?php endif; ?>
			<?php if($episode->podtitle()->isNotEmpty()): ?><itunes:title><?php echo Xml::encode($episode->podtitle()); ?></itunes:title><?php endif; ?>
			<?php if($episode->episodeType()->isNotEmpty()): ?><itunes:episodeType><?php echo Xml::encode($episode->episodeType()); ?></itunes:episodeType><?php endif; ?>
			<content:encoded><![CDATA[
				<?php echo $episode->poddescr()->kirbytext() ?>
			]]></content:encoded>

			<?php if($episode->chapters()->isNotEmpty()): ?>
				<!-- specify chapter information -->
				<psc:chapters version="1.2" xmlns:psc="http://podlove.org/simple-chapters">
				<?php foreach($episode->chapters()->yaml() as $chapter): ?>
					<psc:chapter start="<?php echo $chapter['timestamp']; ?>" title="<?php echo Xml::encode($chapter['title']); ?>" <?php if($chapter['url']): ?>href="<?php echo Xml::encode($chapter['url']); ?>"<?php endif; ?> />
				<?php endforeach; ?>
				</psc:chapters>
			<?php endif; ?>
		</item>
		<?php endforeach ?>
	</channel>
</rss>
