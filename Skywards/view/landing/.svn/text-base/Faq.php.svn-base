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
.faq{ background-color:#e2ddd6; padding:10px; margin:22px 0px;}
.faq li{border-bottom:1px solid #d6cec1; padding:10px;}
.faq li:last-child {border-bottom: none;}
.faq li a{color:#503f2f; font-weight:bold; text-decoration:none;}
.faq li a:hover{color:#CC3333;}
img.img_mid {vertical-align: middle;}
.tc-top-scroll{border-bottom: 1px solid #D6CEC1; margin-bottom:10px;}

.faqResults .q{background: url("images/icon_faq_Q.gif") no-repeat scroll 0 2px transparent;font-weight: bold; margin: 20px 10px 14px;
    padding: 2px 17px;}
.faqResults .a{background: url("images/icon_faq_A.gif") no-repeat scroll 0 2px transparent;
    margin: 0 10px 20px;
    padding: 2px 17px;}
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
                    	<li><a href="#agreement_tc" id="link_agreement_tc">Agreement</a></li>
                    	<li><a href="#modification_terms_tc" id="link_modification_terms_tc">Modification of Terms</a></li>
                    	<li><a href="<?php echo SITE_URL.'index.php?r=landing/Prizes';?>" id="link_prizes_tc">Prizes</a></li>
                    	<li><a href="#entire_agreement_tc" id="link_entire_agreement_tc">Entire Agreement</a></li>
                    	<li><a class="no-btm-brdr" href="#dates_tc" id="link_dates_tc">Dates</a></li>
                    </ul>
                    
                  	<div class="tc-content">
                    	<h2 id="top_content_tc">Frequently asked questions</h2>
                        
                    	<ul class="faq">
                        	<li><a href="#faq1">Where can I find a list of destinations served by Emirates? <img src="images/icon_box_learn_more.gif" width="25" height="16" class="img_mid" /></a></li>
                            <li><a href="#faq2">How do I find my local Emirates Office?  <img src="images/icon_box_learn_more.gif" width="25" height="16" class="img_mid" /></a></li>
                            <li><a href="#faq3">How can I contact Customer Affairs or other departments within Emirates?  <img src="images/icon_box_learn_more.gif" width="25" height="16" class="img_mid" /></a></li>
                            <li><a href="#faq4">How can I learn about employment opportunities with Emirates? <img src="images/icon_box_learn_more.gif" width="25" height="16" class="img_mid" /></a></li>
                            <li><a href="#faq5">How can I contact Emirates to discuss sponsorship opportunities? <img src="images/icon_box_learn_more.gif" width="25" height="16" class="img_mid" /></a></li>
                            <li><a href="#faq6">How can I contact Emirates to discuss supplier opportunities? <img src="images/icon_box_learn_more.gif" width="25" height="16" class="img_mid" /></a></li>
                            <li><a href="#faq7">How can I contact Emirates to discuss inflight advertising? <img src="images/icon_box_learn_more.gif" width="25" height="16" class="img_mid" /></a></li>
                           <li><a href="#faq8">Where can I learn more about the Emirates High Street? <img src="images/icon_box_learn_more.gif" width="25" height="16" class="img_mid" /></a></li>                       
                        </ul>
                        <ul class="faqResults">
                            <li>
                            	<a name="faq1"></a>
                            	<div class="q">Where can I find a list of destinations served by Emirates?</div>
                                <div class="a">Visit our
<a title="Destinations & Offers" href="/ae/english/destinations_offers/destinations_and_offers.aspx">Destinations and Offers</a>
page to see which destinations we serve</div>
                            <a class="tc-top-scroll" href="#top_content_tc"><img src="images/tc-scroll-top-arrow.png" width="7" height="14" /></a></li>
                            <li>
                            	<a name="faq2"></a>
                            	<div class="q">How do I find my local Emirates Office?</div>
                                <div class="a">Use our
<a title="Local Emirates Offices" href="/ae/english/help/offices/local_emirates_offices.aspx">Office Locator</a>
to find the contact details for your nearest Emirates office</div>
                            <a class="tc-top-scroll" href="#top_content_tc"><img src="images/tc-scroll-top-arrow.png" width="7" height="14" /></a></li>
                            <li>
                            	<a name="faq3"></a>
                            	<div class="q">How can I contact Customer Affairs or other departments within Emirates?</div>
                                <div class="a">You can contact the customer services department by mail, fax or phone as follows:<br />
<br />

<p>
Customer Affairs Department
<br>
Emirates
<br>
P.O. Box 686
<br>
Dubai
<br>
United Arab Emirates
<br>
Telephone: +971 4 7083611
<br>
Facsimile: +971 4 2864120
</p>
<p>
For all other departments please mail to:
<br>
Emirates (Department Name)
<br>
P.O. Box 686
<br>
Dubai
<br>
United Arab Emirates
</p></div>
                            <a class="tc-top-scroll" href="#top_content_tc"><img src="images/tc-scroll-top-arrow.png" width="7" height="14" /></a></li>
                            <li>
                            	<a name="faq4"></a>
                            	<div class="q">How can I learn about employment opportunities with Emirates?</div>
                                <div class="a">To learn more about career opportunities and the benefits of working for Emirates, please visit our careers site at
<a target="_blank" href="http://www.emiratesgroupcareers.com/">www.emiratesgroupcareers.com</a>
.</div>
                            <a class="tc-top-scroll" href="#top_content_tc"><img src="images/tc-scroll-top-arrow.png" width="7" height="14" /></a></li>
                            <li>
                            	<a name="faq5"></a>
                            	<div class="q">How can I contact Emirates to discuss sponsorship opportunities?</div>
                                <div class="a">If you are interested in submitting a sponsorship proposal to Emirates please visit our
<a target="_blank" href="http://p.sponsor.com/en/web/emirates/proposals">online sponsorship request site</a>
.</div>
                            <a class="tc-top-scroll" href="#top_content_tc"><img src="images/tc-scroll-top-arrow.png" width="7" height="14" /></a></li>
                            <li>
                            	<a name="faq6"></a>
                            	<div class="q">How can I contact Emirates to discuss supplier opportunities?</div>
                                <div class="a">Please contact us through our dedicated <a target="_blank" href="http://www.procurement.ekgroup.com">procurement website</a>
.</div>
                            <a class="tc-top-scroll" href="#top_content_tc"><img src="images/tc-scroll-top-arrow.png" width="7" height="14" /></a></li>
                            <li>
                            	<a name="faq7"></a>
                            	<div class="q">How can I contact Emirates to discuss inflight advertising?</div>
                                <div class="a">Learn about our inflight
<a title="Inflight Advertising" href="/ae/english/about/inflight_advertising.aspx">advertising opportunities</a>
.</div>
                            <a class="tc-top-scroll" href="#top_content_tc"><img src="images/tc-scroll-top-arrow.png" width="7" height="14" /></a></li>
                            <li>
                            	<a name="faq8"></a>
                            	<div class="q">Where can I learn more about the Emirates High Street?</div>
                                <div class="a">For more information on the Emirates High Street, please visit
<a target="_blank" href="http://www.theemirateshighstreet.com" title="The Emirates High Street">theemirateshighstreet.com</a>
.</div>
                            <a class="tc-top-scroll" href="#top_content_tc"><img src="images/tc-scroll-top-arrow.png" width="7" height="14" /></a></li>
                        </ul>                        
                   </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Middle content section ends -->
         <?php include_once BASEPATH.DS."view".DS."navigation.php"; ?>	