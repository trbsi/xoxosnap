@extends('layouts.site.core')
@section('title', __('general/legal.privacy_policy'))
@section('body')
<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block">
                <article class="post">
                	<h4>{{__('general/legal.privacy_policy')}}</h4>
                    <p>{{config('app.name')}} Inc. and its affiliates or assigns (hereinafter referred to as "<strong>{{config('app.name')}}</strong>") operates and manages the Website platform accessible at <a href="{{env('APP_URL')}}" title="{{config('app.name')}}" class="is-link">{{env('APP_URL')}}</a> including all its subdomains (the "<strong>Platform</strong>"), where independent content uploaders can upload, publish, broadcast, share, license and sell their original videos, offer services such as live stream sessions or tangible goods to users, and where uploaders and users can interact (our "<strong>Services</strong>"), and this privacy policy ("<strong>Privacy Policy</strong>") governs our information practices and describes how we collect, use, share, and protect the information you provide us when using our Services through the Platform. </p>
                    <p>By using the Platform, you agree to the terms of this Privacy Policy, and you understand and agree that this Privacy Policy is incorporated to any terms and conditions or end-user agreement applicable to your use of the Platform, which can be found <a href="{{route('web.terms-of-use')}}" class="is-link">here</a>. and that all capitalized terms used in this Policy and which are not defined herein have the meaning given to them therein. </p>
                    <p class="text-uppercase"><strong>The Platform expressly and strictly limits its use to adults of at least 18 years or having attained the age of majority in their jurisdiction. All persons who do not meet its criteria are strictly forbidden from accessing or viewing the contents of this Platform. Use of the platform is void where prohibited by law. {{config('app.name')}} does not knowingly request and/or collect personal information or data from persons who have not reached the age of majority.</strong></p>
                    <p>{{config('app.name')}} reserves the right to update or otherwise modify this Privacy Policy at anytime. If the changes to the Privacy Policy are significant in nature, we will notify you by email or by posting a prominent notice on the Platform. In such case, such modifications shall become effective thirty (30) days after posting and shall be incorporated to the Privacy Policy. You will be deemed to have accepted these changes if you continue to use the Platform after any such changes. </p>
                    <p>If you disagree with this privacy policy or any amendment thereto, please do not use the Services and delete your account(s).</p>
                    <ol>
                        <li>
                            <strong>WHAT INFORMATION WE COLLECT</strong>
                            <p>The term "Personal Information" means information that specifically identifies any individual, such as name, date of birth, address, phone number, email address, payment/billing information and any other information that is required by applicable law to be treated as Personal Information.</p>
                            <p>When browsing through the Platform, you can do so as a user ("<strong>User</strong>") or as a registered member ("<strong>Member</strong>"). For more clarity, all Members are Users, but not all Users are Members.</p>
                            <p>
                                <strong><em>Users</em></strong><br>
                                While you use the Platform as a User, your device's operating system and unique ID, IP address, access times, MAC address, location and language may be logged automatically. This information may be stored locally on the device you are using and may be communicated to {{config('app.name')}}, notably to ensure proper usage and functioning of the Platform, but also for statistical purposes and in order to improve the Platform and its features.
                            </p>
                            <p>
                                <strong><em>Members</em></strong><br>
                                In addition to the preceding, upon your first use of the Platform as a Member, you will be prompted to provide information in order to create your account and profile linked to your account. This information may be, but is not limited to your name, date of birth, email address, physical address as well as any other information necessary to provide you with the Services and that is required by applicable law to be treated as "personal information".
                            </p>
                            <p>Whenever you use the Platform, we collect data about all of your interactions with the Services and other Users, including Users uploading Content on the Platform, via server log files.&nbsp;This information may be associated with your account and profile, IP address or device ID for the purpose of providing you with the Services and improving your experience.</p>
                            <p>Whenever you participate to a private or semi-private live stream on the Platform your written communications as well as the live streams may be monitored and/or recorded by {{config('app.name')}} for the purpose of ensuring compliance with all applicable laws as well as the <a href="{{route('web.terms-of-use')}}" class="is-link">Terms and Conditions for Users and Members</a> and our <a href="{{route('web.terms-of-use')}}" class="is-link">Terms of Service for Uploaders</a>.  Your participation to a live stream will be associated with your account and profile, IP address and device ID for the purpose of providing you with the Services.</p>
                            <p>When you make a purchase, we might collect information about such purchase and your payment method, and we keep information on your purchase history. The information is mostly used to support your interaction with the Platform as well as to prevent fraud.</p>
                        </li>
                        <li>
                            <strong>WHY WE COLLECT THIS INFORMATION</strong>
                            <p>Our primary goal in collecting and using your personal information is to create your account, provide the Services to you, improve our Services, contact you, conduct research and generate reports for internal use. </p>
                            <p>This information we collect is necessary to provide you with the Platform, and we do not collect any information which is not strictly required by the nature of the Platform. Also, {{config('app.name')}} may sometimes collect information that you willingly provide us, for instance when you contact us, inform us of any request, or inform us of any problem regarding the Platform. </p>
                            <p>Furthermore, {{config('app.name')}} may also collect certain data regarding your use of the Platform, such as the features you use or the sections you navigate on, or any other data to identify the operating system of the device that you are using. This data cannot be used to identify you personally.</p>
                            <p>
                                The information is collected and used notably for the following reasons:<br>
                            </p>
                            <ul>
                                <li>to create your account and profile;</li>
                                <li>to send you information related to the Services, including confirmations, invoices, technical notices, updates, security alerts, and support and administrative messages;</li>
                                <li>to ensure proper functioning of the Platform;</li>
                                <li>to ensure compliance with the <a href="{{route('web.terms-of-use')}}" class="is-link">Terms and Conditions for Users and Members</a> and the <a href="{{route('web.terms-of-use')}}" class="is-link">Terms of Service for Uploaders</a>;</li>
                                <li>to address any problems which are brought to our attention;</li>
                                <li>to monitor and analyze the Services usage and trends and otherwise measure the effectiveness of the Services;</li>
                                <li>to evaluate and improve the content and features of the Platform;</li>
                                <li>to respond to feedback and questions and provide customer support;</li>
                                <li>to tailor your experience with the Platform;</li>
                                <li>to conduct surveys contests and sweepstakes;</li>
                                <li>to prevent fraud;</li>
                                <li>to enhance the experience and enjoyment using our Services; and</li>
                                <li>to contact you about your experience with the Platform and notify you about company news and promotions.</li>
                                &nbsp;
                            </ul>
                            We collect and use your information only where:<br>
                            <ul>
                                <li>We need it to provide you the Services, including to operate the Services, provide customer support and personalized features and to protect the safety and security of the Services;</li>
                                <li>It satisfies a legitimate interest (which is not overridden by your data protection interests), such as for research and development, to market and promote the Services and to protect our legal rights and interests;</li>
                                <li>You give consent to do so for a specific purpose; or</li>
                                <li>We need to process your data to comply with a legal obligation.</li>
                            </ul>
                            <p></p>
                            <p>If you consented to our use of information about you for a specific purpose, you have the right to change your mind at any time, but this will not affect any processing that has already taken place. Where we are using your information because we or a third party have legitimate interest to do so, you have the right to object to that use though, in some cases, this may mean no longer use the Services.</p>
                        </li>
                        <li>
                            <strong>HOW IS THE INFORMATION STORED AND COMMUNICATED</strong>
                            <p>{{config('app.name')}} keeps your information for a period of time it deems reasonable either to fulfill identified purposes, such to ensure proper functioning of the Platform, or in accordance with theaw, whichever time frame is longer. The duration for which we keep your information depends on the type of information:</p>
                            <p>
                            </p>
                            <ul>
                                <li>Account information – we retain your account information for as long as your account is active and a reasonable period thereafter in case you decide to re-activate the Services. We also retain some of your information as necessary to comply with our legal obligations, to resolve disputes, to enforce our agreements, to support business operations, and to continue to develop and improve our Services. Where we retain information for Service improvement and development, we take steps to eliminate information that directly identifies you, and we only use the information&nbsp;to uncover collective insights about the use of our Services, not to specifically analyze personal characteristics about you.&nbsp;&nbsp;</li>
                                <li>Information you share on the Services – If your account is deactivated or disabled, some of your information and the content you have provided will remain in order to allow other users to make full use of the Services. For example, we continue to display the messages you sent to the users that received them.</li>
                                <li>Marketing information –If you have elected to receive marketing emails from us, we retain information about your marketing preferences for a reasonable period of time from the date you last expressed interest in our Services, such as when you last opened an email from us or ceased using your account. We retain information derived from cookies and other tracking technologies for a reasonable period of time from the date such information we created.</li>
                            </ul>
                            <p></p>
                            <p>Once your information is no longer required to be kept, we ensure it remains anonymous or destroy it in a way which ensures protection against unauthorized access or communication. If destruction is not possible (for example, because the information has been stored in backup archives), then we will securely store your information and isolate it from any further use until deletion becomes possible.</p>
                            <p>
                                We never disclose your Personal Information to anyone outside of {{config('app.name')}} without your consent, except for the following:<br>
                            </p>
                            <ul>
                                <li>Our providers whose services have been retained to carry out duties on our behalf (e.g. data processing, data analysis or storage). {{config('app.name')}} takes the necessary means to ensure that these third-party providers process your Personal Information for the sole purpose identified by {{config('app.name')}};</li>
                                <li>If {{config('app.name')}} sells its business, {{config('app.name')}} will include provisions in the selling contract requiring the purchaser to treat your Personal Information in the same manner required by this Policy if it is practicable and permissible to do so. If {{config('app.name')}} purchases a business, the Personal Information received with that business would be treated in accordance with this Policy, if it is practicable and permissible to do so;</li>
                                <li>{{config('app.name')}} may share aggregate or anonymized information about you with advertisers, publishers, business partners, sponsors, and other third parties;</li>
                                <li>Any public authority if the law so requires, to defend our rights, prevent fraud, or otherwise in compliance with the law. In the event where {{config('app.name')}} is required to divulge information or to provide a copy of such information to a governmental authority under law or pursuant to a court order, {{config('app.name')}} will attempt to notify you beforehand, to the extent, however, that it is legally authorized to do so.</li>
                            </ul>
                            <p></p>
                            <p>{{config('app.name')}} may send you notifications through the Platform to send you updates, or other Services related notifications. You can edit and modify your settings at any time through the Platform, including your profile picture and general preferences, as well as your notification preferences.</p>
                            <p>Furthermore, you understand that, as a Member using the Platform, you may be publicly identified by the alias you are using through the Platform, and all the Content posted by you will be visible to other Users. Thus, you are the one controlling the information displayed or posted on your account or profile, and the information you share through the Platform in general, and you are solely and fully responsible for any consequences arising out of such displayed or posted information.</p>
                        </li>
                        <li>
                            <strong>SECURITY</strong>
                            <p>All data is stored on servers with high-security safeguards, protected against misuse and access by unauthorized individuals. </p>
                            <p>Your use of the Platform may involve the transfer, storage and processing of your information to and in various countries around the world where our servers are located and our databases are operated, including the United States of America, that may have different levels of privacy protection than your country. By using the Platform, you consent to your information being transferred to our facilities and to the facilities of those third parties with whom we share it as described in this Privacy Policy.</p>
                            <p>We endeavour to maintain appropriate physical, procedural and technical security with respect to our offices and information storage facilities. Any information is only made available to individuals (employees or agents) who require access to such information to carry out their responsibilities. </p>
                            <p>While we implement safeguards designed to protect your information, no security system is impenetrable and due to the inherent nature of the Internet,&nbsp;we cannot guarantee that data, during transmission through the Internet or while stored on our systems or otherwise in our care,&nbsp;is&nbsp;absolutely&nbsp;safe&nbsp;from&nbsp;intrusion by others. Please note, that we will notify users of a data breach pursuant to applicable law.</p>
                        </li>
                        <li>
                            <strong>HYPERLINKS AND THIRD-PARTY SITES</strong>
                            <p>The Platform may incorporate links to other sites or resources on the Internet, such as third-party social media or social-networking sites or apps. By clicking on such links, you will leave the Platform. Any Personal Information you submit through these sites is subject to such sites’ privacy policy. {{config('app.name')}} does not exercise any control on the operation of any third parties’ websites or applications and the fact that they are listed on the Platform does not incur {{config('app.name')}}’s liability in any manner. </p>
                            <p>Also, when you purchase Content on the Platform, you will be redirected to our payment service provider’s site. In general, the third-party payment providers used by us will only collect, use and disclose your information to the extent necessary to allow them to perform the services they provide to us. We recommend that you read their privacy policies, so you can understand the manner in which your Personal Information will be handled by these providers.</p>
                            <p>Note that the scope of this Privacy Policy is limited to data collected or received by {{config('app.name')}} through your use of the Services.&nbsp;{{config('app.name')}} is not responsible for the activities of third party people or companies, the content of their sites, their use of information, personal or not, you provide to them, or any products or services they may offer. Any link or reference to those sites does not establish our sponsorship of, or affiliation with, those individuals or companies.</p>
                        </li>
                        <li>
                            <strong>COOKIES</strong>
                            <p>We may use cookies (small text files placed on a device’s hard disk) or similar technology to collect some non-identifiable information regarding your computer or mobile device and your activities in order to help improve user experience (e.g. store user’s preferences and settings and authenticate purposes). You can manage your cookie settings directly on your browser, or when applicable, on your device, however, be aware that if you disable or remove cookies, some parts of the Platform might not work properly.</p>
                            <p>
                                <strong>Public Information Including COMMENTS, Online REVIEWS, Blogs and CHAT ROOMS</strong><br>
                                Although we do not recommend it, you may choose to disclose information about yourself in the course of contributing Content within our Services, in chat rooms, blogs, comments, reviews, walls or in similar functions in our Services. Information that you disclose in any of these instances is public information, and as such there is no expectation of privacy or confidentiality towards them.
                            </p>
                            <p>You should be aware that any Personal Information you submit in the course of these public activities can be viewed, collected, copied and/or used by other users of these instances without your consent, and could be used to send you unsolicited messages. We are not responsible for the Personal Information you choose to submit in these instances.</p>
                            <p>If you post a video, image or photo on one of our Services for public view please be aware that these may be viewed, collected, copied and/or used by other Users without your consent. We are not responsible for the videos, images or photos that you choose to submit to our Services for public view.</p>
                        </li>
                        <li>
                            <strong>GENERAL INFORMATION</strong>
                            <p>We offer you choices regarding the collection, correction, usage, retention and disclosure of your Personal Information and we will respect the choices you make. You have the right to refuse further collection, usage, retention and/or disclosure of your Personal Information by notifying us at <a href="mailto:{{config('app.info_email')}}" class="is-link">{{config('app.info_email')}}</a>. However, please note that by doing so your access to our Services might be limited. Below, we describe the tools and processes for making theses requests.</p>
                            <ul>
                                <li>Access and update your information – Our Services give you the ability to access and update information about you from within the Service. For example, you can access your profile information from your account. You can update your profile information within your account settings and modify content that contain information about you using the editing tools associated with that content.</li>
                                <li>Delete your account – if you no longer wish to use our Services, you may delete your Services account. Please note, however, that we may need to retain certain information for record keeping purposes, to complete transactions or to comply with our legal obligations.</li>
                                <li>Opt out from receiving communications – You may opt out from receiving promotional communications from us by using the unsubscribe link within each email we send, updating your email preferences within your account settings menu, or by contacting us as provided below to have your contact information removed from our promotional email list or registration database. Even after you opt out from receiving promotional messages from us, you will continue to receive transactional messages from us regarding our Services. You can opt out from some notification messages in your account settings.</li>
                                <li>Turn off Cookie Controls – Relevant browser-based cookie controls are described in section 6. COOKIES.</li>
                                <li>Send “Do Not Track” Signals – Some browsers have incorporated “Do Not Track” (DNT) features that can send signal to the websites you visit indicating you do not wish to be tracked. Because there is not yet a common understanding of how to interpret the DNT signal, our Services do not currently respond to browser DNT signals. You can use the range of other tools we provide to control data collection and use, including the ability to opt out of receiving marketing from us as described above.</li>
                                <li>Data portability – Data portability is the ability to obtain some of your information in a format you can move from one service provider to another. Depending on the context, this applies to some of your information, but not to all your information. Should you request it, we will provide you with an electronic file of your basic account information and the information you uploaded under your sole control. Such a request will be processed within thirty (30) days of the date of which we receive it.</li>
                            </ul>
                        </li>
                    </ol>
                    <p>In the event of any differences in translations or interpretations, the English version of this Privacy Policy shall prevail.</p>
                    <p>If you have any questions or concerns regarding this Privacy Policy, please contact us at <a href="mailto:{{config('app.info_email')}}" class="is-link">{{config('app.info_email')}}</a>. </p>
                    <p>We will do our best to treat your request promptly. Please note that we may sometimes deny your request under relevant laws.</p>
                </article>
            </div>
        </div>
    </div>
</div>
@endsection