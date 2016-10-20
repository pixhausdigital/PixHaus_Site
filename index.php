<!doctype html>
<html>
<?php
if(!isset($_GET["lang"])){
	$_GET["lang"] = "pt";
}
if($_GET["lang"] == "en"){
	require("lang/en.php");
}else{
	require("lang/pt.php");
}
?>
<head>
<meta charset="utf-8">
<link rel="icon" 
      type="image/png" 
      href="image/favicon.png">
<title><?php echo $text["title"]; ?></title>
<script language="javascript">
	var dialogText= JSON.parse('{"success" : "<?php echo $text["dialogSuccess"] ?>","buttonText" : "<?php echo $text["dialogButtonText"] ?>","title" : "<?php echo $text["dialogTitle"] ?>", "failure" : "<?php echo $text["dialog_securityFail"] ?>", "invalid":{ "email" : "<?php echo $text["dialogValidate_email_fail"] ?>", "name" : "<?php echo $text["dialogValidate_name_fail"] ?>"}, "missing" : { "name" : "<?php echo $text["dialogMising_name"] ?>", "email" : "<?php echo $text["dialogMising_email"] ?>", "subject" : "<?php echo $text["dialogMising_subject"] ?>", "message" : "<?php echo $text["dialogMising_message"] ?>"}}');
</script>
<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">
<link href="jquery-ui-1.12.1.custom/jquery-ui.min.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="js/index.js"></script>
<script src="js/detectmobilebrowser.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
<div id="headerContainer" class="Anton"><header><span id="hamburgerMenu"><img src="image/menu.png" width="33" height="28" alt=""/></span>
<div id="anchorMenuHamburger"><span class="anchorMenu" data-linkTo="orangeTextContainer"><?php echo $text["menu_weAre"]; ?></span><span class="anchorMenu" data-linkTo="weDoContainer"><?php echo $text["menu_weDo"]; ?></span><span class="anchorMenu" data-linkTo="whoContainer"><?php echo $text["menu_whoIs"]; ?></span><span class="anchorMenu" data-linkTo="contactContainer"><?php echo $text["menu_contact"]; ?></span></div>

<div id="anchorMenuContainer"><span class="anchorMenu" data-linkTo="orangeTextContainer"><?php echo $text["menu_weAre"]; ?></span><span class="anchorMenu" data-linkTo="weDoContainer"><?php echo $text["menu_weDo"]; ?></span><span class="anchorMenu" data-linkTo="whoContainer"><?php echo $text["menu_whoIs"]; ?></span><span class="anchorMenu" data-linkTo="contactContainer"><?php echo $text["menu_contact"]; ?></span></div>
<div id="rightTopContainer">

<div id="languageMenuContainer">
<a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']?>?lang=pt">
	<span class="languageSelector" id="ptSelect">
		<img class="notSelected" src="image/ling-port.png" width="23" height="23" alt=""/>
		<img class="selected" src="image/ling-port_selected.PNG" width="23" height="23" alt=""/>
	</span>
    </a>
	<a href="<?php echo $_SERVER['PHP_SELF']?>?lang=en">
    <span class="languageSelector" id="enSelect">
		<img class="notSelected" src="image/ling-engl.png" width="23" height="23" alt=""/>
		<img class="selected" src="image/ling-engl_selected.PNG" width="23" height="23" alt=""/>
	</span>
    </a>
</div>

<div id="socialLinksContainer"><a href="https://www.facebook.com/pixhausdigital/" target="_blank"><img src="image/top-face.png" alt=""/></a><a href="https://www.linkedin.com/company/pixhaus-digital?trk=company_logo" target="_blank"><img src="image/top-link.png" alt=""/></a></div></div>
</header></div>
<div id="bannerContainer" class="partContainer">
<div id="logoContainer"><img src="image/logo.png" width="222" height="73" alt=""/></div>
<div id="textBanner" class="OpenSans"><?php echo $text["textBanner"]; ?></div>
<div id="squares"></div>
</div>
<div id="orangeTextContainer"  class="partContainer">
<div id="orangeTitle" class="partHeader"><?php echo $text["weAre_title"]; ?></div>
<div id="orangeText" class="OpenSans"><?php echo $text["weAre_text"]; ?>
</div>
<div id="sloganContainer"><img src="<?php echo $text["sloganImage_Design"]; ?>" width="127" height="40" alt=""/><img src="<?php echo $text["sloganImage_Technology"]; ?>" width="140" height="40" alt=""/><img src="<?php echo $text["sloganImage_Criative"]; ?>" width="109" height="40" alt=""/></div>
</div>
<div id="weDoContainer"  class="partContainer">
<div id="weDoTitle" class="partHeader"><?php echo $text["weDo_title"]; ?></div>
<div id="weDoSubtitle"  class="OpenSans mobile"><?php echo $text["weDo_subtitle"]; ?></div>
<div id="weDoImagesCenterContainer">
<div id="weDoImagesContainer">
<div class="weDoFloater"><div id="bannersContainer" class="weDoContainers"><img src="image/BannerClean.png" width="360" height="360" alt=""/><h3><div class="floaterSpacer"><span id="banners"><?php echo $text["weDo_banners_figcaption"]; ?></span></div><img src="image/triangle_corner_orange.png" alt=""/></h3>

<div class="weDoOverlay">
<div class="overlayTextContainer">
<div class="overlayTextTitle Anton"><?php echo $text["weDo_banners_overlayTitle"]; ?></div>
<div class="overlayTextSeparator"><img src="image/Diamante.png" width="24" height="24" alt=""/></div>
<div class="overlayText OpenSans"><?php echo $text["weDo_banners_overlayText"]; ?>
</div>
</div>
</div>

</div></div>

<div class="weDoFloater"><div id="siteContainer" class="weDoContainers"><img src="image/SitesClean.png" width="360" height="360" alt=""/><h3><div class="floaterSpacer"><span id="sites"><?php echo $text["weDo_sites_figcaption"]; ?></span></div><img src="image/triangle_corner_orange.png" alt=""/></h3>

<div class="weDoOverlay">
<div class="overlayTextContainer">
<div class="overlayTextTitle Anton"><?php echo $text["weDo_sites_overlayTitle"]; ?></div>
<div class="overlayTextSeparator"><img src="image/Diamante.png" width="24" height="24" alt=""/></div>
<div class="overlayText OpenSans"><?php echo $text["weDo_sites_overlayText"]; ?></div>
</div>
</div>

</div></div>

<div class="weDoFloater"><div id="appsContainer" class="weDoContainers"><img src="image/AppsClean.png" width="360" height="360" alt=""/><h3><div class="floaterSpacer"><span id="apps"><?php echo $text["weDo_apps_figcaption"]; ?></span></div><img src="image/triangle_corner_orange.png" alt=""/></h3>

<div class="weDoOverlay"><div class="overlayTextContainer">
<div class="overlayTextTitle Anton"><?php echo $text["weDo_apps_overlayTitle"]; ?></div>
<div class="overlayTextSeparator"><img src="image/Diamante.png" width="24" height="24" alt=""/></div>
<div class="overlayText OpenSans"><?php echo $text["weDo_apps_overlayText"]; ?>
</div>
</div></div>

</div></div>

<div class="weDoFloater"><div id="socialContainer" class="weDoContainers"><img src="image/SocialClean.png" width="360" height="360" alt=""/><h3><div class="floaterSpacer"><span id="scoials"><?php echo $text["weDo_social_figcaption"]; ?></span></div><img src="image/triangle_corner_orange.png" alt=""/></h3>

<div class="weDoOverlay"><div class="overlayTextContainer">
<div class="overlayTextTitle Anton"><?php echo $text["weDo_social_overlayTitle"]; ?></div>
<div class="overlayTextSeparator"><img src="image/Diamante.png" width="24" height="24" alt=""/></div>
<div class="overlayText OpenSans"><?php echo $text["weDo_social_overlayText"]; ?></div>
</div></div>

</div></div>

<div class="weDoFloater"><div id="specialContainer" class="weDoContainers"><img src="image/SpecialClean.png" width="360" height="360" alt=""/><h3><div class="floaterSpacer"><span id="specials"><?php echo $text["weDo_special_figcaption"]; ?></span></div><img src="image/triangle_corner_orange.png" alt=""/></h3>

<div class="weDoOverlay"><div class="overlayTextContainer">
<div class="overlayTextTitle Anton"><?php echo $text["weDo_special_overlayTitle"]; ?></div>
<div class="overlayTextSeparator"><img src="image/Diamante.png" width="24" height="24" alt=""/></div>
<div class="overlayText OpenSans"><?php echo $text["weDo_special_overlayText"]; ?>
</div>
</div></div>

</div></div>

<div class="weDoFloater"><div id="creativeContainer" class="weDoContainers"><img src="image/CriativeClean.png" width="360" height="360" alt=""/><h3><div class="floaterSpacer"><span id="criatives"><?php echo $text["weDo_creative_figcaption"]; ?></span></div><img src="image/triangle_corner_orange.png" alt=""/></h3>

<div class="weDoOverlay"><div class="overlayTextContainer">
<div class="overlayTextTitle Anton"><?php echo $text["weDo_creative_overlayTitle"]; ?>
</div>
<div class="overlayTextSeparator"><img src="image/Diamante.png" width="24" height="24" alt=""/></div>
<div class="overlayText OpenSans"><?php echo $text["weDo_creative_overlayText"]; ?></div>
</div></div>

</div></div>

</div>
</div>
</div>
<div id="whoContainer"  class="partContainer">
<div id="whoTitle" class="Anton partHeader"><?php echo $text["whoIs_title"]; ?></div>
<div id="whoText">
<div id="whoKlaus" class="whoPerson"><div id="whoK_imageContainer" class="whoImageContainer"><span class="whoSocialContainer largeView"><a href="https://www.facebook.com/klaus.r.koster" target="_blank"><img class="largeView" src="image/top-face.png" width="33" height="33" alt=""/></a><a href="https://www.linkedin.com/in/klaus-koster-b3745a1" target="_blank"><img src="image/top-link.png" width="33" height="33" alt=""/></a></span><img id="KPic" src="image/foto-klaus.png" width="220" height="220" alt=""/><span class="whoSocialContainer smallView"><a href="https://www.facebook.com/klaus.r.koster" target="_blank"><img src="image/top-face.png" width="33" height="33" alt=""/></a><a href="https://www.linkedin.com/in/klaus-koster-b3745a1" target="_blank"><img src="image/top-link.png" width="33" height="33" alt=""/></a></span></div>
<div id="whoK_Title" class="Anton whoTitle"><?php echo $text["whoIs_person1_title"]; ?></div>
<div id="whoK_Text" class="OpenSans"><?php echo $text["whoIs_person1_text"]; ?></div>
</div>
<div id="whoMauro" class="whoPerson">
<div id="whoM_imageContainer" class="whoImageContainer"><span class="whoSocialContainer smallView"><a href="https://www.facebook.com/mauro.letizia" target="_blank"><img class="smallView" src="image/top-face.png" width="33" height="33" alt=""/></a><a href="https://br.linkedin.com/in/mauroletizia" target="_blank"><img src="image/top-link.png" width="33" height="33" alt=""/></a></span><img id="MPic" src="image/foto-mauro.png" width="220" height="220" alt=""/><span class="whoSocialContainer largeView"><a href="https://www.facebook.com/mauro.letizia" target="_blank"><img src="image/top-face.png" width="33" height="33" alt=""/></a><a href="https://br.linkedin.com/in/mauroletizia" target="_blank"><img src="image/top-link.png" width="33" height="33" alt=""/></a></span></div>
<div id="whoM_Title" class="Anton whoTitle"><?php echo $text["whoIs_person2_title"]; ?></div>
<div id="whoM_Text" class="OpenSans"><?php echo $text["whoIs_person2_text"]; ?></div>
</div>
</div>
</div>
<div id="contactContainer"  class="partContainer">
<div id="contactTitle" class="Anton partHeader"><?php echo $text["contact_title"]; ?></div>
<div id="contactSubTitle" class="OpenSans"><?php echo $text["contact_subtitle"]; ?></div>
<div id="contactInformation" class="OpenSans"><?php echo $text["contact_information"]; ?></div>
<div id="contactForm">
<form method="post" id="mailForm">
<div id="messageContainer">
<div id="formFields">
<span class="field">
<input type="text" name="name" placeholder="<?php echo $text["contact_form_namePlaceholder"]; ?>"
<?php if(isset($_POST["name"])){ echo 'value="'.$_POST["name"].'" ';}?>
 />
</span>
<span class="field">
<input type="email" name="email" placeholder="<?php echo $text["contact_form_emailPlaceholder"]; ?>"
<?php if(isset($_POST["email"])){ echo 'value="'.$_POST["email"].'" ';}?>
/>
</span>
<span class="field">
<input type="text" name="subject" placeholder="<?php echo $text["contact_form_subjectPlaceholder"]; ?>" 
<?php if(isset($_POST["subject"])){ echo 'value="'.$_POST["subject"].'" ';}?>
/>
</span>
</div>
<div id="message">
<textarea name="message" placeholder="<?php echo $text["contact_form_messagePlaceholder"]; ?>"><?php if(isset($_POST["message"])){ echo 'value="'.$_POST["message"].'" ';}?></textarea>
</div>
<div id="formLastLine">
<button id="submitButton" type="button"><?php echo $text["contact_form_submitButton"]; ?></button>
<span class="clear"></span>
</div>
</div>

</form>
<div id="contactInfoForm" class="OpenSans"><?php echo $text["contact_form_information"]; ?></div>
</div>
</div>
<div id="footerContainer" class="OpenSans"><footer><span id="companyName"><?php echo $text["footer_companyName"]; ?></span><img src="image/Diamond_small.png" width="9" height="9" alt=""/> <span id="credits"><?php echo $text["footer_credits"]; ?></span></footer></div>

<div id="formDialog"></div>
<div id="hiddenStuff"></div>
</body>
</html>