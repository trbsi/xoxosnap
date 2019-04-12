<?php
return [
	'over_18' => 'Are you over 18?',
	'accept_that_you_are_over_18' => 'This website contains age-restricted materials. If you are under the age of 18 years, or under the age of majority in the location from where you are accessing this website you do not have authorization or permission to enter this website or access any of its materials. If you are over the age of 18 years or over the age of majority in the location from where you are accessing this website by entering the website you hereby agree to comply with all the TERMS AND CONDITIONS. You also acknowledge and agree that you are not offended by nudity and explicit depictions of sexual activity.<br><br>By clicking on the "OK" button, and by entering this website you agree with all the above and certify under penalty of perjury that you are an adult.',
	'guest' => [
		'followers' => 'Followers',
		'videos' => 'Videos',
		'member_since' => 'Member Since',
		'gender' => 'Gender',
		'website' => 'Website',
		'visit_website' => 'Visit Website',
		'send_email' => 'Send Email',
		'make_second_count' => 'Make Every Second Count',
		'watch_uncensored_video' => 'Watch uncensored short videos!',
		'visitor_description_1' => 'Be Entertained & Inspired By A Community Of Porn Stars, Cam Models, Exotic Dancers and Amateur Performers!',
		'visitor_description_2' => 'Follow your favorite performers to watch uncensored short video clips! ',
		'visitor_description_3' => 'Discover new performers from all over the world!',
		'performer_description_1' => sprintf('Performers make money by sharing short video clips daily on %s! ', config('app.name')),
		'performer_description_2' => 'Reliable payouts for performers! ',
		'performer_description_3' => 'Performers sign in with your Twitter account and get started making money today!', 
		'viewers' => 'Viewers',
		'performers' => 'Performers',
		'recommended_performers' => 'Recommended performers',
		'login_to_follow' => 'Login to follow',
		'if_you_want_to_follow' => 'If you want to follow',
		'register_or_login' => 'please register or login :)',
		'join_community' => 'Join a Naughty Community Now',
		'register_as_performer_viewer' => 'Register as a performer or a viewer:',
		'login_as_performer_viewer' => 'Login as a performer or a viewer:',
	],
	'viewer' => [
		'views' => 'views',
		'video_is_locked' => 'Video is locked',
		'amount' => 'Amount:',
		'coins' => 'NaughtyCoins',
		'pay_to_access' => 'Do you want to pay to access it?',
		'story_is_locked' => 'Story is locked',
		'followed' => 'Followed',
		'already_following' => 'You\'re already following this user',
		'login_to_view_video' => 'Login to view this video',
	],
	'performer' => [
		'current_earnings' => 'Current Balance',
		'total_earnings' => 'Total Earnings',
		'followers' => 'Followers',
		'top_ten_videos_by_earnings' => 'Top 10 videos by earnings',
		'twitter_feed' => 'Twitter feed',
		'view_your_profile' => 'View your public profile:',
		'cannot_display_twitter_feed' => 'We can\'t display Twitter feed.',
		'not_connected_with_twitter_account' => 'You haven\'t logged in via your Twitter account.',
		'add_video' => 'Add video',
		'add_story' => 'Add story',
		'none_so_far' => 'None so far. Add videos and start earning!',		
		'not_verified' => [
			'profile_not_verified' => 'Please verify your profile',
			'upload_stories_videos_verify' => 'In order to be able to upload stories and videos and earn money please complete the form below for verification &#128522;',
			'choose_photo' => 'Choose your photo',
			'verify_profile_step_1' => sprintf('Please write "%s + Your Member ID Number" on a paper.', config('app.name')),
			'verify_profile_step_2' => 'Take a selfie of yourself with the paper so we can verify it\'s you (something like what Rick from The Walking Dead did &#128521;)',
			'number' => 'Member ID Number',
			'hold_on_we_are_verifying_you' => 'Hold on! We\'re working on verification. It will take up to 24h &#128513;',
			'send' => 'Send',
			'request_sent' => 'Your request has been submitted',
		],
	],
	'performer_video_form' => [
		'description' => 'Description',
		'title' => 'Title',
		'cost' => 'Cost ($)',
		'video' => 'Video',
		'choose_video' => 'Choose a video',
		'expiry' => 'Expiry',	
		'expires_never' => 'Never',
		'expires_choose' => 'Expires in',
		'days' => 'days',
		'hours' => 'hours',
		'minutes' => 'minutes',
		'preview' => 'Preview',
		'upload_video' => 'Upload video',
		'capture_thumbnail' => 'Capture thumbnail',
		'capture_info' => 'Find a scene you want to set as thumbnail, pause and click the button',
		'thumbnail' => 'Thumbnail',
		'validation_error_field' => 'Field',
		'validation_error_must_not_be_empty' => 'must be filled',
		'choose_thumbnail' => 'You must capture a thumbnail for your video',
		'reset' => 'Reset',
		'success' => 'Success',
		'video_uploaded' => 'Your video has been uploaded :)',
		'please_choose_video' => 'Please choose a video',
		'max_video_length' => 'Video can be max :duration minutes long',
		'tags' => 'Tags',
		'submit' => 'Submit',
		'cancel' => 'Cancel',
	],
	'performer_story_form' => [
		'upload_story' => 'Upload story',
		'choose_video_or_image' => 'Choose videos and/or images',
		'reset' => 'Reset',
		'preview' => 'Preview',
		'action' => 'Action',
		'name' => 'Name',
		'remove' => 'Remove',
		'max_video_length' => 'Video can be max :duration seconds long',
		'story_added' => 'Story successfully added :)',
		'add_only_images_videos' => 'File not allowed. You may add only images and videos (mp4)',
		'expiry' => 'Expiry',
		'expires_24' => 'After 24h',
		'expires_choose' => 'Expires in',
		'expires_in' => 'Expires in',

	],
	'performer_tour' => [
		'exit' => 'Exit',
		'next' => 'Next',
		'back' => 'Back',
		'done' => 'Done',
		'public_profile' => "If you click on your username you'll be redirected to your public profile.<br><br>Once there you'll be able to view your videos, edit your videos, delete your videos, view your number of followers and view your personal information for your followers.",
		'upload_media' => 'Here you can upload your videos and stories. Choose when your videos expire, the video thumbnail, how much they cost to view and much more!',
		'current_balance' => 'This is your current balance for payout',
		'total_balance' => sprintf('This is your total earnings. It displays how much you have earned so far on %s', config('app.name')),
		'number_of_followers' => 'Your number of followers',
		'twitter_feed' => "If you connected via Twitter you'll be able to see your feed here",
		'top_videos_by_earnings' => 'Your Top 10 Most Profitable Videos',	
		'explore_menu' => 'Explore new videos, stories and performers',
		'header_followers_notifications' => "Everytime someone follows you, you'll recieve a notification",
		'header_notifications' => "Everytime someone buys one of your videos you'll recieve a notification",
		'header_coins' => 'Quickly see your current balance for payout',
		'user_menu_hover_to_reveal' => 'View your profile settings.',
		'user_menu_click_to_reveal' => 'Click to reveal menu.',
		'user_menu_explanation' => "Here you can logout or access your profile's settings.<br><br>In settings you can edit info about yourself and change your profile picture, username, email and much more",
		'that_is_all' => sprintf("That's all for now :) welcome to the naughty %s community", config('app.name')),
		'header_search' => 'Search for videos and performers',
		'performer_not_verified' => "In order to post videos and earn money you need to be verified. <br><br>Once you are verified you'll be able to add videos and stories.",
	],
	'viewer_tour_follow_performers' => [
		'exit' => 'Exit',
		'next' => 'Next',
		'back' => 'Back',
		'done' => 'Done',
		'explore_menu' => 'Explore new NAUGHTY videos, stories and performers',
		'header_notifications' => "Everytime a performer you follow posts new video you'll receive a notification",
		'header_coins' => 'Quickly see your current balance',
		'user_menu' => 'View your profile settings.',
		'user_menu_responsive' => 'Click to reveal menu.',
		'user_menu_explanation' => "Here you can logout or access your profile's settings. In settings you can change your username, email and password",
		'that_is_all' => sprintf("That's all for now :) welcome to the naughty %s community", config('app.name')),
		'header_search' => 'Search for NAUGHTY videos and performers',
		'follow_performers' => "Start following performers. <br><br>After you follow performers and refresh the page you'll see their stories and videos",
		'performer_stories' => 'You can watch UNCENSORED stories of performers you follow',
		'performer_videos' => 'You can watch UNCENSORED videos of performers you follow!!',
	],
];