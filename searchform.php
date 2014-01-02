<form class="form-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="submit" id="searchsubmit" value="<?php icl_translate("header", "search_form", "Sök") ?>" class="btn">
	<div>
		<input type="search" id="s" name="s" placeholder="<?php icl_translate("header", "search_form", "Vad letar du efter?") ?>" value="<?php echo get_search_query(); ?>" />
	</div>
</form>
