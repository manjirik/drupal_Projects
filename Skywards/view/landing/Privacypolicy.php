<?php

$userfriend_count='';
$fb_id=$_SESSION['fb_user_id'];
	if($fb_id){
			$user_iddetails =$this->getUserIdFromFbId($fb_id);
			$user_id = $user_iddetails[0]->user_id;

			if($user_id!=''){
				$userfriend_count=$this->Myentries->getCountUserEntries($user_id);
			}
	}


?>
<style>
.tc-top-scroll{border-bottom: 1px solid #D6CEC1; margin-bottom:10px;}
</style>
<!-- Middle content section -->
            <div class="tabs">
                <ul class="tab-list">
<?php
				 if( $userfriend_count > 0 ){ ?>
					<li><a href="<?php echo SITE_URL;?>index.php?r=myentries/show_entries">Return</a></li>
<?php				 }else{ ?>
				    <li><a href="<?php echo SITE_URL;?>index.php?r=home">Return</a></li>
<?php				 } ?>
                    
                </ul>
                <div class="tc-content-wrapper">
                	<ul class="tc-left-nav">
                    	<li><a href="#ic">Information collection</a></li>
                    	<li><a href="#consent">Consent</a></li>
                        <li><a href="#wconsent">Withdrawing your consent</a></li>
                    	<li><a href="#security" >Security</a></li>
                        <li><a href="#aggdata">Aggregate Data</a></li>
                    	<li><a href="#cookies">Cookies</a></li>
                        <li><a href="#links">Links</a></li>
                        <li><a href="#correct">Corrections/updates</a></li>
                        <li><a href="#atyi">Access to your information</a></li>
                        <li><a href="#tpi">Transfer personal Info</a></li>
                        <li><a href="#noc">Notification of changes</a></li>
                    </ul>
                    
                  	<div class="tc-content">
                    	<h2 id="top_content_tc">Privacy policy</h2>
                        
                    	<ul>
							<li>
                            	<a name="ic"></a>
                            	<h3 class="no-brdr-top">Information collection and use</h3>
                        <p>Emirates Group ("Emirates") includes any and all of the following entities and/or divisions: Emirates, dnata, dnata World Travel, Emirates Skycargo, Skywards, Emirates Holidays, Arabian Adventures, Wolgan Valley Resort & Spa and their associated brands and/or companies from time to time. A list is available upon request from: Corporate Communications, Emirates Group Headquarters, PO Box 686, Dubai, United Arab Emirates.</p>
                        <p>We are responsible for the processing of any personal information you provide to this Web site and we are notified where required in each country under the relevant data protection legislation of that country.                          </p>
                        <p>We take our responsibilities regarding the protection of personal information very seriously. This policy explains how we use personal information that we may obtain about you.</p>
                        <a class="tc-top-scroll" href="#top_content_tc"><img src="images/tc-scroll-top-arrow.png" width="7" height="14" /></a>
                        </li>
                        <li>
                        	<a name="consent"></a>
                        	<h3 class="no-brdr-top">Consent</h3>
                        	<p>By choosing to provide Emirates with your personal information you are consenting to its use in accordance with the principles outlined in this Privacy Statement and as outlined at the time you are asked to provide any personal information. Emirates may contact you by phone or email in order to provide you with updates pertaining to its services as well as information about additional offers, products or events that Emirates believes may be of interest to you. You can choose to unsubscribe to these updates or from having your personal information used for market research purposes.</p>
                            <a class="tc-top-scroll" href="#top_content_tc"><img src="images/tc-scroll-top-arrow.png" width="7" height="14" /></a>
                        </li>
                        <li>
                        	<a name="wconsent"></a>
                        	<h3 class="no-brdr-top">Withdrawing your consent</h3>
                        	<p>
All marketing communications Emirates sends to you will provide you with a way to withdraw your consent. If you no longer wish to receive promotional materials you may opt-out of receiving these communications by
<a href="/ae/english/destinations_offers/subscribe_to_offers/mail_unsubscribe.aspx" title="Unsubscribe from Offers" onclick="s_objectID="http://www.emirates.com/ae/english/destinations_offers/subscribe_to_offers/mail_unsubscribe.aspx_1";return this.s_oc?this.s_oc(e):true">clicking here</a>
, this will remove you from Emirates mail lists. To unsubscribe from Skywards communication go to
<a class="bodyLink" target="_blank" href="http://www.skywards.com" onclick="s_objectID="http://www.skywards.com/_1";return this.s_oc?this.s_oc(e):true">www.skywards.com</a>
. You will always be notified when their information is being collected by any outside parties. We do this so you can make an informed choice as to whether they should proceed with services that require an outside party, or not.
</p>
<p>Please note that if you do not consent to Emirates’s use and disclosure of your personal information, this may affect our ability to provide you with particular products and services.</p>
                            <a class="tc-top-scroll" href="#top_content_tc"><img src="images/tc-scroll-top-arrow.png" width="7" height="14" /></a>
                        </li>
                        <li>
                        	<a name="security"></a>
                        	<h3 class="no-brdr-top">Security</h3>
                        	<p>We will take appropriate steps to protect the personal information you share with us. We have implemented technology and security features to safeguard the privacy of your personal information.</p>
                            <a class="tc-top-scroll" href="#top_content_tc"><img src="images/tc-scroll-top-arrow.png" width="7" height="14" /></a>
                        </li>
                        <li>
                        	<a name="aggdata"></a>
                        	<h3 class="no-brdr-top">Aggregate Data</h3>
                        	<p>We may aggregate personal information and remove any identifying elements in order to analyze patterns and improve our marketing and promotional efforts, to analyze website use, to improve our content and product offerings, and to customize our site’s content, layout and services.</p>
                            <p>
                            We gather certain usage information like the number and frequency of visitors to this site. This information may include which URL you just came from, which URL you next go to, what browser you are using, and your IP address. We only use such data in the aggregate. This collective data helps us to determine how much our customers use parts of the site, and do internal research on our users’ demographics, interests, and behaviour to better understand and serve you.
                            </p>
                            <a class="tc-top-scroll" href="#top_content_tc"><img src="images/tc-scroll-top-arrow.png" width="7" height="14" /></a>
                        </li>
                        <li>
                        	<a name="cookies"></a>
                        	<h3 class="no-brdr-top">Cookies</h3>
                        	<p>A “cookie” is a small bit of text used by a browser to store information. When you visit a site that uses cookies, the Web server will request permission to pass a cookie to your browser. If accepted, it will occupy only a few bytes on your hard drive and can improve your Web surfing experience. Emirates uses cookies to track customer visits through our site. This information enables us to save you time when returning to the site by saving your password so you do not have to re-enter it each time you visit. Cookies cannot profile your system or collect information from your hard drive. And although you may receive cookies from many different sites, each cookie can only be read by the Web server that originally issued it. Most browsers are initially set up to accept cookies, but you can set your browsers to refuse cookies.</p> 
                            <a class="tc-top-scroll" href="#top_content_tc"><img src="images/tc-scroll-top-arrow.png" width="7" height="14" /></a>
                        </li>
                        <li>
                        	<a name="links"></a>
                        	<h3 class="no-brdr-top">Links</h3>
                        	<p>Our web site may contain links to other web sites. Please be aware that we are not responsible for the privacy practices of web sites not operated by us or an entity in the "Emirates Group". We encourage you to read the privacy statements of each and every web site that collects personally identifiable information. This privacy statement applies solely to information collected by our web site.</p> 
                            <a class="tc-top-scroll" href="#top_content_tc"><img src="images/tc-scroll-top-arrow.png" width="7" height="14" /></a>
                        </li>
                        <li>
                        	<a name="correct"></a>
                        	<h3 class="no-brdr-top">Correction</h3>
                        	<p>If your personally identifiable information changes, or if you no longer desire our service, we will provide a way to correct, update or remove your personal information provided to us.</p> 
                            <a class="tc-top-scroll" href="#top_content_tc"><img src="images/tc-scroll-top-arrow.png" width="7" height="14" /></a>
                        </li>
                        <li>
                        	<a name="atyi"></a>
                        	<h3 class="no-brdr-top">Access to your information</h3>
                        	<p>You have the right to see personal information we keep about you. We will endeavour to provide the information you require within a reasonable time. There may be a small monetary charge for some requests, depending on the information requested. If you are concerned that any of the information we hold on you is incorrect please
<a href="/ae/english/help/contact_us/contact_us.aspx" title="Contact Us" onclick="s_objectID="http://www.emirates.com/ae/english/help/contact_us/contact_us.aspx_1";return this.s_oc?this.s_oc(e):true">contact us</a>
.</p> 
                            <a class="tc-top-scroll" href="#top_content_tc"><img src="images/tc-scroll-top-arrow.png" width="7" height="14" /></a>
                        </li>
                        <li>
                        	<a name="tpi"></a>
                        	<h3 class="no-brdr-top">Transfer personal Info</h3>
                        	<p>Some parties that process or store personal information may be located in jurisdictions outside your country of residence. Therefore, your information may be processed and stored in these jurisdictions and, as a result, foreign governments, courts, or law enforcement or regulatory agencies may be able to obtain disclosure of your information through the laws in these countries.</p> 
                            <a class="tc-top-scroll" href="#top_content_tc"><img src="images/tc-scroll-top-arrow.png" width="7" height="14" /></a>
                        </li>
                        <li>
                        	<a name="noc"></a>
                        	<h3 class="no-brdr-top">Notification of Changes</h3>
                        	<p>If we decide to change our Privacy Statement, we will post those changes on our web site so you are always aware of what information we collect, how we use it, and under circumstances, if any, we disclose it. If at any point we decide to use personally identifiable information in a manner different from that stated at the time it was collected, we will notify you by way of an email. You will have a choice as to whether or not we use your information in this different manner. We will use information in accordance with the Privacy Statement under which the information was collected.</p> 
                            <a class="tc-top-scroll" href="#top_content_tc"><img src="images/tc-scroll-top-arrow.png" width="7" height="14" /></a>
                        </li>
</ul>
                   </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Middle content section ends -->
            <script type="text/javascript">
			$(document).ready(function(){
				$('.tc-content').jScrollPane();
			});
			</script>
			<?php include_once BASEPATH.DS."view".DS."navigation.php"; ?>	