<?php get_header(); ?>
<?php 

//var_dump($member); 

$member_meta = (object) get_user_meta($member->ID);

//var_dump($member_meta);

?>
<div class="row-fluid vcard">
	<div class="span3">
		<figure>
			<?php echo get_avatar( $member->user_email, 270); ?>
		</figure>
	</div>
	<div class="span3">
		<h1 class="fn"><?php echo $member->display_name; ?></h1>
		<p class="title"><?php echo $member_meta->title[0]; ?></p><span class="org" title="Elvenite AB"></span>
		<p>Mobil: <span class="tel"><?php echo $member_meta->mobile[0]; ?></span><br />
		Tel: <span class="tel"><?php echo $member_meta->phone[0]; ?></span><br />
		Email: <a href="mailto:<?php echo $member->user_email; ?>" class="email"><?php echo $member->user_email; ?></a></p>
		
		<?php // social media links 
		$social_media_links = array();
		$fb_name = $member_meta->facebook[0];
		if ($fb_name){
			$fb_url = $fb_name = (substr($fb_name, 0, 4) == 'http') ? $fb_name : 'https://facebook.com/' . $fb_name;
			$social_media_links['facebook'] = array(
				'name' => 'Facebook',
				'url' => $fb_url,
			);
		}
		
		$tw_name = $member_meta->twitter[0];
		if ($tw_name){
			$tw_name = (substr($tw_name, 0, 1) != '@') ? '@' . substr($tw_name, strrpos($tw_name, '/')) : $tw_name;
			$tw_url = 'http://twitter.com/' . substr($tw_name, 1);
			
			$social_media_links['twitter'] = array(
				'name' => $tw_name,
				'url' => $tw_url,
			);
		}
		
		$linkedin_url = $linkedin_name = $member_meta->linkedin[0];
		
		if ($linkedin_name){

			$social_media_links['linkedin'] = array(
				'name' => 'Linked In',
				'url' => $linkedin_url,
			);
		}
		
		$gplus_url = $gplus_name = $member_meta->googleplus[0];
		
		if ($gplus_name){
			$social_media_links['googleplus'] = array(
				'name' => 'Google Plus',
				'url' => $gplus_url . '?rel=author',
			);
		}
		
		if ($social_media_links){ ?>
			<ul class="social-media-links">
			<?php foreach($social_media_links AS $key => $item){ ?>
				<li><i class="social-icon-<?php echo $key; ?>"></i> <a rel="me" href="<?php echo $item['url']; ?>"><?php echo $item['name']; ?></a></li>
			<?php } ?>
			</ul>
		<?php } ?>
	</div>
	<div class="span4">
		<?php if ( $member_meta->description[0] ) { ?>
			<p><?php echo $member_meta->description[0]; ?></p>
		<?php } ?>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<hr />
		<?php $contact_us_page = get_page_by_path('kontakta-oss'); ?>
		<a href="<?php echo get_permalink($contact_us_page->ID); ?>">Tillbaka till kontakta oss</a>
	</div>
</div>

	</div><!-- .container -->
<?php get_footer(); ?>