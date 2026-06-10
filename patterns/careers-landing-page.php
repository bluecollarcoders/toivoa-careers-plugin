<?php
/**
 * Title: Careers Landing Page
 * Slug: m2-careers/careers-landing-page
 * Categories: m2-careers
 * Description: High-tech careers landing page with filtered query loops for Internal and Partner positions
 * Keywords: careers, jobs, internal, partner, query, landing
 */
?>

<!-- wp:group {"tagName":"main","align":"full","style":{"color":{"background":"#05070a"},"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group alignfull" style="background-color:#05070a;margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0">

	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"80px","bottom":"80px","left":"64px","right":"64px"}},"color":{"gradient":"linear-gradient(45deg,#5344f4 0%,#dec9ff 100%)"}},"layout":{"type":"constrained","contentSize":"1280px"}} -->
	<div class="wp-block-group alignfull has-background" style="background:linear-gradient(45deg,#5344f4 0%,#dec9ff 100%);padding-top:80px;padding-right:64px;padding-bottom:80px;padding-left:64px">
		<!-- wp:heading {"textAlign":"center","level":1,"style":{"color":{"text":"#2000a4"},"typography":{"fontSize":"48px","fontWeight":"700","lineHeight":"56px","letterSpacing":"-0.02em","fontFamily":"Sora"},"spacing":{"margin":{"bottom":"24px"}}}} -->
		<h1 class="wp-block-heading has-text-align-center" style="color:#2000a4;margin-bottom:24px;font-family:Sora;font-size:48px;font-weight:700;letter-spacing:-0.02em;line-height:56px">Engineering Careers</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","style":{"color":{"text":"#2000a4"},"typography":{"fontSize":"16px","fontWeight":"400","lineHeight":"24px","fontFamily":"Geist"},"spacing":{"margin":{"bottom":"0"}}}} -->
		<p class="has-text-align-center" style="color:#2000a4;margin-bottom:0;font-family:Geist;font-size:16px;font-weight:400;line-height:24px">Join elite technical teams building the future of measurement and precision engineering</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"64px","bottom":"64px"},"padding":{"left":"64px","right":"64px"}}},"layout":{"type":"constrained","contentSize":"1280px"}} -->
	<div class="wp-block-group alignwide" style="margin-top:64px;margin-bottom:64px;padding-left:64px;padding-right:64px">

		<!-- wp:heading {"level":2,"style":{"color":{"text":"#e1e2e7"},"typography":{"fontSize":"32px","fontWeight":"600","lineHeight":"40px","letterSpacing":"-0.01em","fontFamily":"Sora"},"spacing":{"margin":{"bottom":"12px"}}}} -->
		<h2 class="wp-block-heading" style="color:#e1e2e7;margin-bottom:12px;font-family:Sora;font-size:32px;font-weight:600;letter-spacing:-0.01em;line-height:40px">Internal Positions</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"color":{"text":"#c7c4d9"},"typography":{"fontSize":"12px","fontWeight":"500","lineHeight":"16px","letterSpacing":"0.08em","fontFamily":"JetBrains Mono"},"spacing":{"margin":{"bottom":"32px"}}}} -->
		<p style="color:#c7c4d9;margin-bottom:32px;font-family:JetBrains Mono;font-size:12px;font-weight:500;letter-spacing:0.08em;line-height:16px">CORE TEAM ROLES</p>
		<!-- /wp:paragraph -->

		<!-- wp:query {"queryId":1,"query":{"perPage":10,"pages":0,"offset":0,"postType":"m2_career","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":{"m2_career_type":["internal"]},"meta_query":[{"key":"m2_status","value":"Open","compare":"="}]},"align":"full"} -->
		<div class="wp-block-query alignfull">
			<!-- wp:post-template {"style":{"spacing":{"blockGap":"24px"}},"layout":{"type":"grid","columnCount":2}} -->
			<!-- wp:group {"style":{"color":{"background":"#0d1117"},"border":{"radius":"4px","color":"#ffffff10","width":"1px"},"spacing":{"padding":{"top":"24px","bottom":"24px","left":"24px","right":"24px"}},"position":{"type":""}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-border-color has-background" style="border-color:#ffffff10;border-width:1px;border-radius:4px;background-color:#0d1117;padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px">

				<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"16px"},"blockGap":"8px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
				<div class="wp-block-group" style="margin-bottom:16px">
					<!-- wp:post-title {"level":3,"isLink":true,"style":{"color":{"text":"#e1e2e7"},"typography":{"fontSize":"18px","fontWeight":"600","lineHeight":"24px","fontFamily":"Sora"},"elements":{"link":{"color":{"text":"#e1e2e7"}}},"spacing":{"margin":{"bottom":"0"}}}} /-->

					<!-- wp:paragraph {"style":{"color":{"text":"#c7c4d9","background":"#5344f415"},"typography":{"fontSize":"12px","fontWeight":"500","lineHeight":"16px","letterSpacing":"0.08em","fontFamily":"JetBrains Mono"},"border":{"radius":"9999px"},"spacing":{"padding":{"top":"4px","bottom":"4px","left":"12px","right":"12px"},"margin":{"bottom":"0"}}}} -->
					<p style="color:#c7c4d9;background-color:#5344f415;margin-bottom:0;padding-top:4px;padding-right:12px;padding-bottom:4px;padding-left:12px;border-radius:9999px;font-family:JetBrains Mono;font-size:12px;font-weight:500;letter-spacing:0.08em;line-height:16px">INTERNAL</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"8px","margin":{"bottom":"16px"}}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group" style="margin-bottom:16px">
					<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"core/post-meta","args":{"key":"m2_location"}}}},"style":{"color":{"text":"#c7c4d9"},"typography":{"fontSize":"14px","fontWeight":"400","lineHeight":"20px","fontFamily":"Geist"},"spacing":{"margin":{"bottom":"4px"}}}} -->
					<p style="color:#c7c4d9;margin-bottom:4px;font-family:Geist;font-size:14px;font-weight:400;line-height:20px">📍 </p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"core/post-meta","args":{"key":"m2_employment_type"}}}},"style":{"color":{"text":"#c7c4d9"},"typography":{"fontSize":"14px","fontWeight":"400","lineHeight":"20px","fontFamily":"Geist"},"spacing":{"margin":{"bottom":"0"}}}} -->
					<p style="color:#c7c4d9;margin-bottom:0;font-family:Geist;font-size:14px;font-weight:400;line-height:20px">💼 </p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false,"excerptLength":20,"style":{"color":{"text":"#c7c4d9"},"typography":{"fontSize":"14px","fontWeight":"400","lineHeight":"20px","fontFamily":"Geist"},"spacing":{"margin":{"bottom":"16px"}}}} /-->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"stretch"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"width":100,"style":{"color":{"text":"#e1e2e7","background":"#1d2023"},"border":{"radius":"4px","color":"#ffffff10","width":"1px"},"typography":{"fontSize":"12px","fontWeight":"500","letterSpacing":"0.08em","fontFamily":"JetBrains Mono"},"spacing":{"padding":{"top":"8px","bottom":"8px"}}}} -->
					<div class="wp-block-button has-custom-width wp-block-button__width-100">
						<a class="wp-block-button__link has-text-color has-background has-border-color wp-element-button" style="border-color:#ffffff10;border-width:1px;border-radius:4px;color:#e1e2e7;background-color:#1d2023;padding-top:8px;padding-bottom:8px;font-family:JetBrains Mono;font-size:12px;font-weight:500;letter-spacing:0.08em">VIEW DETAILS</a>
					</div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->

			</div>
			<!-- /wp:group -->
			<!-- /wp:post-template -->

			<!-- wp:query-no-results -->
			<!-- wp:paragraph {"style":{"color":{"text":"#c7c4d9"},"typography":{"fontSize":"14px","fontWeight":"400","lineHeight":"20px","fontFamily":"Geist"}}} -->
			<p style="color:#c7c4d9;font-family:Geist;font-size:14px;font-weight:400;line-height:20px">No internal positions currently available.</p>
			<!-- /wp:paragraph -->
			<!-- /wp:query-no-results -->
		</div>
		<!-- /wp:query -->

	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"64px","bottom":"64px"},"padding":{"left":"64px","right":"64px"}}},"layout":{"type":"constrained","contentSize":"1280px"}} -->
	<div class="wp-block-group alignwide" style="margin-top:64px;margin-bottom:64px;padding-left:64px;padding-right:64px">

		<!-- wp:heading {"level":2,"style":{"color":{"text":"#e1e2e7"},"typography":{"fontSize":"32px","fontWeight":"600","lineHeight":"40px","letterSpacing":"-0.01em","fontFamily":"Sora"},"spacing":{"margin":{"bottom":"12px"}}}} -->
		<h2 class="wp-block-heading" style="color:#e1e2e7;margin-bottom:12px;font-family:Sora;font-size:32px;font-weight:600;letter-spacing:-0.01em;line-height:40px">Partner Opportunities</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"color":{"text":"#c7c4d9"},"typography":{"fontSize":"12px","fontWeight":"500","lineHeight":"16px","letterSpacing":"0.08em","fontFamily":"JetBrains Mono"},"spacing":{"margin":{"bottom":"32px"}}}} -->
		<p style="color:#c7c4d9;margin-bottom:32px;font-family:JetBrains Mono;font-size:12px;font-weight:500;letter-spacing:0.08em;line-height:16px">EXTERNAL COLLABORATIONS</p>
		<!-- /wp:paragraph -->

		<!-- wp:query {"queryId":2,"query":{"perPage":10,"pages":0,"offset":0,"postType":"m2_career","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":{"m2_career_type":["partner"]},"meta_query":[{"key":"m2_status","value":"Open","compare":"="}]},"align":"full"} -->
		<div class="wp-block-query alignfull">
			<!-- wp:post-template {"style":{"spacing":{"blockGap":"24px"}},"layout":{"type":"grid","columnCount":2}} -->
			<!-- wp:group {"style":{"color":{"background":"#0d1117"},"border":{"radius":"4px","color":"#ffffff10","width":"1px"},"spacing":{"padding":{"top":"24px","bottom":"24px","left":"24px","right":"24px"}},"position":{"type":""}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-border-color has-background" style="border-color:#ffffff10;border-width:1px;border-radius:4px;background-color:#0d1117;padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px">

				<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"16px"},"blockGap":"8px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
				<div class="wp-block-group" style="margin-bottom:16px">
					<!-- wp:post-title {"level":3,"isLink":true,"style":{"color":{"text":"#e1e2e7"},"typography":{"fontSize":"18px","fontWeight":"600","lineHeight":"24px","fontFamily":"Sora"},"elements":{"link":{"color":{"text":"#e1e2e7"}}},"spacing":{"margin":{"bottom":"0"}}}} /-->

					<!-- wp:paragraph {"style":{"color":{"text":"#c7c4d9","background":"#ffb59715"},"typography":{"fontSize":"12px","fontWeight":"500","lineHeight":"16px","letterSpacing":"0.08em","fontFamily":"JetBrains Mono"},"border":{"radius":"9999px"},"spacing":{"padding":{"top":"4px","bottom":"4px","left":"12px","right":"12px"},"margin":{"bottom":"0"}}}} -->
					<p style="color:#c7c4d9;background-color:#ffb59715;margin-bottom:0;padding-top:4px;padding-right:12px;padding-bottom:4px;padding-left:12px;border-radius:9999px;font-family:JetBrains Mono;font-size:12px;font-weight:500;letter-spacing:0.08em;line-height:16px">PARTNER</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"8px","margin":{"bottom":"16px"}}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group" style="margin-bottom:16px">
					<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"core/post-meta","args":{"key":"m2_partner_company"}}}},"style":{"color":{"text":"#ffb597"},"typography":{"fontSize":"14px","fontWeight":"400","lineHeight":"20px","fontFamily":"Geist"},"spacing":{"margin":{"bottom":"4px"}}}} -->
					<p style="color:#ffb597;margin-bottom:4px;font-family:Geist;font-size:14px;font-weight:400;line-height:20px">🤝 </p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"core/post-meta","args":{"key":"m2_location"}}}},"style":{"color":{"text":"#c7c4d9"},"typography":{"fontSize":"14px","fontWeight":"400","lineHeight":"20px","fontFamily":"Geist"},"spacing":{"margin":{"bottom":"4px"}}}} -->
					<p style="color:#c7c4d9;margin-bottom:4px;font-family:Geist;font-size:14px;font-weight:400;line-height:20px">📍 </p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"core/post-meta","args":{"key":"m2_employment_type"}}}},"style":{"color":{"text":"#c7c4d9"},"typography":{"fontSize":"14px","fontWeight":"400","lineHeight":"20px","fontFamily":"Geist"},"spacing":{"margin":{"bottom":"0"}}}} -->
					<p style="color:#c7c4d9;margin-bottom:0;font-family:Geist;font-size:14px;font-weight:400;line-height:20px">💼 </p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:post-excerpt {"moreText":"","showMoreOnLine":false,"excerptLength":20,"style":{"color":{"text":"#c7c4d9"},"typography":{"fontSize":"14px","fontWeight":"400","lineHeight":"20px","fontFamily":"Geist"},"spacing":{"margin":{"bottom":"16px"}}}} /-->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"stretch"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"width":100,"style":{"color":{"text":"#e1e2e7","background":"#1d2023"},"border":{"radius":"4px","color":"#ffffff10","width":"1px"},"typography":{"fontSize":"12px","fontWeight":"500","letterSpacing":"0.08em","fontFamily":"JetBrains Mono"},"spacing":{"padding":{"top":"8px","bottom":"8px"}}}} -->
					<div class="wp-block-button has-custom-width wp-block-button__width-100">
						<a class="wp-block-button__link has-text-color has-background has-border-color wp-element-button" style="border-color:#ffffff10;border-width:1px;border-radius:4px;color:#e1e2e7;background-color:#1d2023;padding-top:8px;padding-bottom:8px;font-family:JetBrains Mono;font-size:12px;font-weight:500;letter-spacing:0.08em">VIEW DETAILS</a>
					</div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->

			</div>
			<!-- /wp:group -->
			<!-- /wp:post-template -->

			<!-- wp:query-no-results -->
			<!-- wp:paragraph {"style":{"color":{"text":"#c7c4d9"},"typography":{"fontSize":"14px","fontWeight":"400","lineHeight":"20px","fontFamily":"Geist"}}} -->
			<p style="color:#c7c4d9;font-family:Geist;font-size:14px;font-weight:400;line-height:20px">No partner opportunities currently available.</p>
			<!-- /wp:paragraph -->
			<!-- /wp:query-no-results -->
		</div>
		<!-- /wp:query -->

	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"64px","bottom":"64px","left":"64px","right":"64px"}},"color":{"background":"#0d1117"},"border":{"top":{"color":"#ffffff10","width":"1px"}}},"layout":{"type":"constrained","contentSize":"1280px"}} -->
	<div class="wp-block-group alignfull has-background" style="border-top-color:#ffffff10;border-top-width:1px;background-color:#0d1117;padding-top:64px;padding-right:64px;padding-bottom:64px;padding-left:64px">
		<!-- wp:heading {"textAlign":"center","level":3,"style":{"color":{"text":"#e1e2e7"},"typography":{"fontSize":"24px","fontWeight":"600","lineHeight":"32px","fontFamily":"Sora"},"spacing":{"margin":{"bottom":"16px"}}}} -->
		<h3 class="wp-block-heading has-text-align-center" style="color:#e1e2e7;margin-bottom:16px;font-family:Sora;font-size:24px;font-weight:600;line-height:32px">Ready to Engineer the Future?</h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","style":{"color":{"text":"#c7c4d9"},"typography":{"fontSize":"16px","fontWeight":"400","lineHeight":"24px","fontFamily":"Geist"},"spacing":{"margin":{"bottom":"32px"}}}} -->
		<p class="has-text-align-center" style="color:#c7c4d9;margin-bottom:32px;font-family:Geist;font-size:16px;font-weight:400;line-height:24px">Join our mission to build precision measurement systems that advance human knowledge and capability.</p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-buttons">
			<!-- wp:button {"style":{"color":{"text":"#2000a4","gradient":"linear-gradient(45deg,#5344f4 0%,#dec9ff 100%)"},"border":{"radius":"4px"},"typography":{"fontSize":"12px","fontWeight":"500","letterSpacing":"0.08em","fontFamily":"JetBrains Mono"},"spacing":{"padding":{"top":"12px","bottom":"12px","left":"24px","right":"24px"}}}} -->
			<div class="wp-block-button">
				<a class="wp-block-button__link has-text-color has-background wp-element-button" style="border-radius:4px;color:#2000a4;background:linear-gradient(45deg,#5344f4 0%,#dec9ff 100%);padding-top:12px;padding-right:24px;padding-bottom:12px;padding-left:24px;font-family:JetBrains Mono;font-size:12px;font-weight:500;letter-spacing:0.08em" href="mailto:careers@measuretwice.com">SUBMIT YOUR PORTFOLIO</a>
			</div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->

</main>
<!-- /wp:group -->