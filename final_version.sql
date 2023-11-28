-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3308
-- Thời gian đã tạo: Th10 28, 2023 lúc 11:36 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `electro`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `short_description` mediumtext DEFAULT NULL,
  `long_description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `tag`, `date_time`, `short_description`, `long_description`, `image`, `slug`, `created_at`, `updated_at`, `user_id`, `status`, `link`) VALUES
(2, 'Robot Wars', 'Design', '2023-11-02 13:54:53', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium a, enim. Pellentesque congue. Ut in risus volutpat libero pharetra tempor. Cras vestibulum bibendum augue. Praesent egestas leo in pede. Praesent blandit odio eu enim. Pellentesque sed dui ut augue blandit sodales. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam nibh. Mauris ac mauris sed pede pellentesque fermentum. Maecenas adipiscing ante non diam sodales hendrerit.', 'https://transvelo.github.io/electro-html/2.0/assets/img/1500X730/img1.jpg', 'robot-wars', NULL, NULL, 1, NULL, NULL),
(3, 'Robot Wars 1', 'Games', '2023-11-02 13:54:53', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium a, enim. Pellentesque congue. Ut in risus volutpat libero pharetra tempor. Cras vestibulum bibendum augue. Praesent egestas leo in pede. Praesent blandit odio eu enim. Pellentesque sed dui ut augue blandit sodales. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam nibh. Mauris ac mauris sed pede pellentesque fermentum. Maecenas adipiscing ante non diam sodales hendrerit.', 'https://transvelo.github.io/electro-html/2.0/assets/img/1500X730/img7.jpg', 'robot-wars-1', NULL, NULL, 1, NULL, NULL),
(4, 'Endgame author Omid Scobie criticises translated extracts of royal book', 'News', '2023-11-26 18:13:57', 'Omid Scobie criticises media reports that use translations of extracts from his new book Endgame.', 'The author of a forthcoming book about the Royal Family has urged people to wait until it comes out, saying media reports were using \"bad translations and snippets without context\".\r\nOmid Scobie, a r… [+3463 chars]', 'https://ichef.bbci.co.uk/news/1024/branded_news/D6BB/production/_131817945_gettyimages-1244429539.jpg', 'endgame-author-omid-scobie-criticises-translated-extracts-of-royal-book', '2023-11-26 11:13:57', '2023-11-26 11:13:57', NULL, NULL, NULL),
(5, 'Watch: Moment Israeli boy reunites with dad after hostage ordeal', 'News', '2023-11-26 18:13:57', 'Nine-year-old Ohad Munder, held by Hamas for seven weeks, ran towards his father on Friday.', 'There was joy and relief as Israeli hostages freed by Hamas were reunited with their families on Friday.\r\nNine-year-old Ohad Munder ran down the hallway of Schneider Children\'s Medical Center in Peta… [+176 chars]', 'https://ichef.bbci.co.uk/news/1024/branded_news/12549/production/_131818057_israelboyrunningcopy2.jpg', 'watch-moment-israeli-boy-reunites-with-dad-after-hostage-ordeal', '2023-11-26 11:13:57', '2023-11-26 11:13:57', NULL, NULL, NULL),
(6, 'Harvard under fire for helping elite skip the queue', 'News', '2023-11-26 18:13:57', 'Children of past students are favoured in admissions - now state legislators are calling for this to end.', 'Harvard University is facing a crisis after a landmark court case exposed how it gives the relatives of alumni a leg-up. Its so-called legacy admissions policy is now in the crosshairs of lawmakers w… [+8986 chars]', 'https://ichef.bbci.co.uk/news/1024/branded_news/4D13/production/_131813791_microsoftteams-image-1.png', 'harvard-under-fire-for-helping-elite-skip-the-queue', '2023-11-26 11:13:57', '2023-11-26 11:13:57', NULL, NULL, NULL),
(7, 'Israel\'s Palestinian prisoner release a \'window of hope\' in West Bank', 'News', '2023-11-26 18:13:57', 'The return of 39 women and teenagers is being seen by some as a symbolic victory over Israel.', 'By nightfall, the road in front of the Beitunia checkpoint had the feel of a restive festival, the sting of politics and tear gas mingling in the air.\r\nSmall campfires flickered in front of a handful… [+4211 chars]', 'https://ichef.bbci.co.uk/news/1024/branded_news/C649/production/_131816705_f150a44a59cdbac54c676ea5342c02d4afda7b69.jpg', 'israels-palestinian-prisoner-release-a-window-of-hope-in-west-bank', '2023-11-26 11:13:57', '2023-11-26 11:13:57', NULL, NULL, NULL),
(8, 'Ukraine war: Kyiv hit by biggest drone since war began', 'News', '2023-11-26 18:13:57', 'Thousands of homes are without power after Russia bombarded the capital over six hours.', 'Russia has launched its biggest drone attack on Kyiv since its full-scale invasion of Ukraine began last year, officials say. \r\nResidents were woken by explosions before dawn on Saturday, and for mor… [+2032 chars]', 'https://ichef.bbci.co.uk/news/1024/branded_news/6703/production/_131817362_71a363a1d7c10a74519bc65cbd190b3742a489550_99_4918_27674918x2767.jpg', 'ukraine-war-kyiv-hit-by-biggest-drone-since-war-began', '2023-11-26 11:13:57', '2023-11-26 11:13:57', NULL, NULL, NULL),
(9, 'Israel Gaza live news: Second day of truce to see more hostages released', 'News', '2023-11-26 18:13:57', 'As well as the captives in Gaza, more Palestinian detainees are expected be released from Israeli prisons.', 'There were late night scenes of celebration outside a hospital where some of the freed Israeli women and children were taken for medical checks and to be reunited with their families. \r\nTheyd been br… [+813 chars]', 'https://m.files.bbci.co.uk/modules/bbc-morph-news-waf-page-meta/5.3.0/bbc_news_logo.png', 'israel-gaza-live-news-second-day-of-truce-to-see-more-hostages-released', '2023-11-26 11:13:57', '2023-11-26 11:13:57', NULL, NULL, NULL),
(10, 'Derek Chauvin stabbed in prison - US media reports', 'News', '2023-11-26 18:13:57', 'The ex-police officer who murdered George Floyd is thought to have survived the attack.', 'Minneapolis ex-police officer Derek Chauvin, convicted in the death of George Floyd, has been stabbed at an Arizona prison, US media reports say.\r\nA source told AP the 47-year-old was seriously injur… [+1308 chars]', 'https://ichef.bbci.co.uk/news/1024/branded_news/11835/production/_122233717_chauvin.jpg', 'derek-chauvin-stabbed-in-prison-us-media-reports', '2023-11-26 11:13:57', '2023-11-26 11:13:57', NULL, NULL, NULL),
(11, 'Adult Survivors Act deadline prompts rush of sexual assault lawsuits', 'News', '2023-11-26 18:13:57', 'A number of celebrities have been accused of sexual assault in recent weeks, in part due to a legal deadline.', 'A legal deadline has prompted a rush of sexual assault lawsuits against high-profile figures including Axl Rose, Sean \"Diddy\" Combs and New York Mayor Eric Adams.\r\nThe list of names has grown this we… [+3683 chars]', 'https://ichef.bbci.co.uk/news/1024/branded_news/E449/production/_131814485_gettyimages-1204034574-1.jpg', 'adult-survivors-act-deadline-prompts-rush-of-sexual-assault-lawsuits', '2023-11-26 11:13:57', '2023-11-26 11:13:57', NULL, NULL, NULL),
(12, 'When this truce ends, the decisive next phase of war begins', 'News', '2023-11-26 18:13:57', 'If Israel decides to go south, a larger humanitarian disaster could be looming, writes Paul Adams.', 'Israel\'s military campaign in Gaza City is probably in its final stages. \r\nThe truce, brokered to allow for the release of Israeli hostages and Palestinian prisoners, will delay the IDF by anywhere f… [+7467 chars]', 'https://ichef.bbci.co.uk/news/1024/branded_news/9507/production/_131815183_breifingspromo.png', 'when-this-truce-ends-the-decisive-next-phase-of-war-begins', '2023-11-26 11:13:57', '2023-11-26 11:13:57', NULL, NULL, NULL),
(13, 'Rapper Sean \'Diddy\' Combs accused of rape in new lawsuit', 'News', '2023-11-26 18:13:57', 'The US rapper and music mogul is accused in a civil suit of assaulting a college student in 1991.', 'Rap mogul Sean \"Diddy\" Combs is being sued by a woman who says he drugged and sexually assaulted her in 1991. \r\nIn a lawsuit seen by the BBC, the plaintiff says the assault took place during a date w… [+2438 chars]', 'https://ichef.bbci.co.uk/news/1024/branded_news/FE92/production/_131807156_gettyimages-1397520451-1.jpg', 'rapper-sean-diddy-combs-accused-of-rape-in-new-lawsuit', '2023-11-26 11:13:57', '2023-11-26 11:13:57', NULL, NULL, NULL),
(14, 'Tests aren’t enough: Case study after adding type hints to urllib3', 'News', '2023-11-26 18:32:52', 'Since Python 3.5 was released in 2015 including PEP 484 and the typing module type hints have grown from a nice-to-have to an expectation for popular packages.  To fulfill this expectation our team...', 'Since Python 3.5 was released in 2015 including PEP 484 and the typing module type hints have grown from a nice-to-have to an expectation for popular packages. To fulfill this expectation our team ha… [+11991 chars]', 'http://sethmlarson.dev/static/avatar.jpeg', 'tests-arent-enough-case-study-after-adding-type-hints-to-urllib3', '2023-11-26 11:32:52', '2023-11-26 11:32:52', NULL, NULL, NULL),
(18, 'bigscience/T0pp · Hugging Face', 'News', '2023-11-26 18:34:49', 'We’re on a journey to advance and democratize artificial intelligence through open source and open science.', 'Model Description\r\nT0* is a series of encoder-decoder models trained on a large set of different tasks specified in natural language prompts. We convert numerous English supervised datasets into prom… [+11344 chars]', 'https://huggingface.co/front/thumbnails/v2-2.png', 'bigsciencet0pp-hugging-face', '2023-11-26 11:34:49', '2023-11-26 11:34:49', NULL, NULL, NULL),
(21, 'Opening up a physics simulator for robotics', 'News', '2023-11-26 18:34:49', 'As part of DeepMind\'s mission of advancing science, we have acquired the MuJoCo physics simulator and are making it freely available for everyone, to support research everywhere.', 'Advancing research everywhere with the acquisition of MuJoCo\r\nWhen you walk, your feet make contact with the ground. When you write, your fingers make contact with the pen. Physical contacts are what… [+1849 chars]', 'https://lh3.googleusercontent.com/jVZ3VN7wwx2dSowqLmhqm0qAzAmcb-1t7ks3HiNnoHknihF5sl9VDEwuCNTSxfx8jFIi7mBQkvHUdnSKXSPgYLNpvCuE4YajJeMnrYA', 'opening-up-a-physics-simulator-for-robotics', '2023-11-26 11:34:49', '2023-11-26 11:34:49', NULL, NULL, NULL),
(49, 'Show HN: Why is forecasting so hard?', 'News', '2023-11-26 19:11:14', 'Hey HN folks -- I am a graduate student exploring the space of time-series forecasting. I wrote a Colab notebook to highlight the challenges in forecasting: what makes it difficult, and how standardized forecasting accuracy metrics can be misleading.I used th…', '', 'https://colab.research.google.com/img/colab_favicon_256px.png', 'show-hn-why-is-forecasting-so-hard', '2023-11-26 12:11:14', '2023-11-26 12:11:14', NULL, NULL, NULL),
(50, 'Show HN: Magictool.ai – Privacy-First AI Productivity App with 20 AI Features', 'News', '2023-11-26 19:11:14', 'Article URL: https://chrome.google.com/webstore/detail/magictoolai-chatgpt-+-20/fedmdabgnkfghjplejeilojikdaopkpm\nComments URL: https://news.ycombinator.com/item?id=38404707\nPoints: 1\n# Comments: 1', 'Your AI Productivity booster app packed with 20 AI features in one place for your convenience, including ChatGPT\r\nAre you tired of having to use multiple tools for different tasks? Say goodbye to tha… [+4952 chars]', 'https://lh3.googleusercontent.com/p9CapMyfFvK4NzG1yCPYvUlfnOyiBB1uhwXw4ML_XzwNIrYv1mcfpAB1SURa5KSfIkR-7O4SQNNMATc89RsKd3p6jA=s128-rj-sc0x00ffffff', 'show-hn-magictoolai-privacy-first-ai-productivity-app-with-20-ai-features', '2023-11-26 12:11:14', '2023-11-26 12:11:14', NULL, NULL, NULL),
(51, 'Show HN: AIHairstylist – Try Hairstyles Instantly', 'News', '2023-11-26 19:11:14', 'Try 100s of hair styles and hair colors instantly on your face', 'Welcome to the future of hairstyling! Experience a revolutionary way to explore and discover your perfect hairdo with AI Hairstylist. Whether you\'re looking for a fresh haircut or a stunning hair col… [+1378 chars]', 'https://play-lh.googleusercontent.com/Aib9J6jiTnDn0dPCqG1F8yVTUqyf5Kf9Bm3nUdJpCRpLk9lwiUm17EW4MZAdFab6oBw', 'show-hn-aihairstylist-try-hairstyles-instantly', '2023-11-26 12:11:14', '2023-11-26 12:11:14', NULL, NULL, NULL),
(53, 'Show HN: Blenny, AI vision copilot for the web', 'News', '2023-11-26 19:11:14', 'While still in its early phases, we\'re excited to have people test and provide feedback as we improve. BYOK (GPT-4V) for now.\n\nComments URL: https://news.ycombinator.com/item?id=38402482\nPoints: 2\n# Comments: 0', 'Screenshot any part of a webpage, and Blenny will instantly help you summarize, translate, apply custom agents, and do more.\r\n Access AI vision anywhere on the web.\r\nNo more switching between AI plat… [+1056 chars]', 'https://lh3.googleusercontent.com/4alAvtaDH09yVTZtFJj_jC_IUJMZ0HsY1miNhl-jmsXC0rGHP33aot_FdYeMvFk4CpXRzXfLe_RKEKnanShDrN1CCg=s128-rj-sc0x00ffffff', 'show-hn-blenny-ai-vision-copilot-for-the-web', '2023-11-26 12:11:14', '2023-11-26 12:11:14', NULL, NULL, NULL),
(55, 'Show HN: Sensus – Constructive PR Comments', 'News', '2023-11-26 19:11:14', 'Being rude and dismissive in code reviews is as destructive as shouting at your kid — you both will suffer.We all have good intentions, but even the best have bad days. We all can be grumpy, impatient, or insecure.“Am I helping to resolve this PR?” is a valua…', 'Your little helper for more humane, constructive GitHub comments.\r\nNothing discourages people from collaborating with you more than impolite and dismissive comments.\r\nUsually, you dont want to be a j… [+148 chars]', 'https://lh3.googleusercontent.com/02eTvulH0S6a9eB3xEgUFcAmtDmFmyaLOAAzyhzczSOKbI_th8E7Q4wwqoaJO-zu9xuxGyjZYNiJJd5IC-LcntJn=s128-rj-sc0x00ffffff', 'show-hn-sensus-constructive-pr-comments', '2023-11-26 12:11:14', '2023-11-26 12:11:14', NULL, NULL, NULL),
(63, 'Show HN: The 30 second habit that can have a big impact on your life', 'News', '2023-11-26 19:11:14', 'Inspired by: https://www.huffpost.com/entry/the-30-second-habit-that_b_48...\n\nComments URL: https://news.ycombinator.com/item?id=38377593\nPoints: 1\n# Comments: 0', 'Capture key insights in 30 seconds with Recap, your post-meeting and lecture reflection tool.\r\nRecap: Capture Key Insights\r\nAre you tired of forgetting the important details from meetings, lectures, … [+2846 chars]', 'https://lh3.googleusercontent.com/UH40yQJxB0JLuo9mpZkspNvVtYw-BEaXnHFMxy3rl7AaIwFAeVcrg6HtzqgCmyuzTHjQX9GO5VzhQkS1T1vg_DLz=s128-rj-sc0x00ffffff', 'show-hn-the-30-second-habit-that-can-have-a-big-impact-on-your-life', '2023-11-26 12:11:14', '2023-11-26 12:11:14', NULL, NULL, NULL),
(64, 'Show HN: I made a Chrome extension for LeetCode 1v1s to make DSA practice fun', 'News', '2023-11-26 19:11:14', 'hey HN,i think a lot of people would agree that grinding leetcode sucks. i\'ve always wanted a more engaging form of dsa practice, so i made LeetBattle. i started off just 1v1ing my roommates, we realized it was really fun, discussing the problem together was …', '1v1 LeetCode battles against your friends to improve your coding skills fast!\r\nA Leetcode 1v1 platform to make data structures and algorithms fun! Create a private match with your friends or find a m… [+209 chars]', 'https://lh3.googleusercontent.com/Dg2Us-APCAjeAFtWgn1okTo0yEaVtGJKl-lNXyWjZxfJEE2NcVnRnazSKZG599Qd9yLeTptTgDZ4v8zTHoFjrZQz=s128-rj-sc0x00ffffff', 'show-hn-i-made-a-chrome-extension-for-leetcode-1v1s-to-make-dsa-practice-fun', '2023-11-26 12:11:14', '2023-11-26 12:11:14', NULL, NULL, NULL),
(71, 'Show HN: An Undetectable YouTube Adblocker', 'News', '2023-11-26 19:11:14', 'Hey HN! Me and my brother made an undetectable YouTube adblocker that doesn\'t get detected by Youtube (yet). Would love to hear what you guys think!\n\nComments URL: https://news.ycombinator.com/item?id=38357229\nPoints: 2\n# Comments: 1', 'An undetectable youtube adblocker\r\nThis adblocker blocks youtube ads without being detected.\r\nWhy it\'s good:\r\n Lightweight: Extremely light on resources.\r\n Efficient: Uses EventListening outperformin… [+218 chars]', 'https://lh3.googleusercontent.com/-O4-KedbhqGgst4dO4c5e_xwg8uO87RE1v1K5dD14iXnNrBbxL7HhpAxY67AYd-413xR_nDKL1SGe2fF3Ybu6LbTTg=s128-rj-sc0x00ffffff', 'show-hn-an-undetectable-youtube-adblocker', '2023-11-26 12:11:14', '2023-11-26 12:11:14', NULL, NULL, NULL),
(72, 'Show HN: Tabbana – manage browser tabs via instructions (Chrome extension)', 'News', '2023-11-26 19:11:14', 'I made a chrome extension to manage browser tabs using natural language instructions (e.g. \"close all hackernews tabs\").I built it for myself and find it especially useful when I have a ton of tabs open. Just set your OpenAI API key (stored locally in your br…', 'Manage your browser tabs with natural language instructions.\r\nTabbana takes a natural language instruction (e.g., \"close all my facebook tabs\") and manages your tabs for you.\r\nTo configure Tabbana, y… [+620 chars]', 'https://lh3.googleusercontent.com/Tf7jMEaau1zR-ie8Kpt5jwrI1OguOCzSVBVt1JaBrv_mj7c4j3X0KYME3M018g2Z-IDs1aVEEccJmCpKqerTca7ZiA=s128-rj-sc0x00ffffff', 'show-hn-tabbana-manage-browser-tabs-via-instructions-chrome-extension', '2023-11-26 12:11:14', '2023-11-26 12:11:14', NULL, NULL, NULL),
(74, 'Show HN: Eye Relief Workouts in Chrome', 'News', '2023-11-26 19:11:14', 'Hi, the maker here.\nLike most developers, I stare at my work screen for many hours a day, completely forgetting that my eyes need rest. Yes, in an ideal world you need to go for a walk, do eye exercises, and also sleep well, etc.I tried different techniques a…', 'Clear Your Vision and Mind with Eye Relief Workouts\r\nIn today\'s digital age, where our eyes are constantly exposed to screens and various sources of visual stress, it\'s crucial to prioritize the heal… [+2701 chars]', 'https://lh3.googleusercontent.com/TL4LOi7tQfk_3wLDZUund2C3f1T-m4aLWGaZxCwjS0xxGU8j7TBTSyyJG5jIjMxe-jvIYCRx_TOmonQOhFlOcDAx6Q=s128-rj-sc0x00ffffff', 'show-hn-eye-relief-workouts-in-chrome', '2023-11-26 12:11:14', '2023-11-26 12:11:14', NULL, NULL, NULL),
(76, 'Web Content Accessibility Guidelines 2.2 in simple language', 'News', '2023-11-26 19:11:14', 'Haley Penrod, \nGoogle Sheets, \nNov 19, 2023\n\n\n \n \r\nHaley Penrod has provided a really useful service, rewriting the Web Accessibility Guidelines in a form that can be read by humans (as opposed to the original, which can be understood only by lawyers). Now of…', 'User can always find help when navigating content or completing tasks. Help can look like the following:- Human contact details such as a phone number, email address, hours of operation.- Human conta… [+241 chars]', 'https://lh7-us.googleusercontent.com/docs/AHkbwyL9Wjfgf6JXTtDWwXSmiWVmlqGolXhF_io0_BDnjlFiSKwwuu9jT_om0cPGbQtg8Tv-9gJknTMvA2aRVxUGwl5-wROPZYkaxIHIYp1cxOuVeTc=w1200-h630-p', 'web-content-accessibility-guidelines-22-in-simple-language', '2023-11-26 12:11:14', '2023-11-26 12:11:14', NULL, NULL, NULL),
(78, 'Show HN: Devtools Responsive Mode on Steroids', 'News', '2023-11-26 19:11:14', 'I made this tool that lets you see any site - on all devices - at the same time. Imagine devtools device preview, but you can see all the devices simultaneously - thats what this is. You can pick and choose devices as needed.It works on localhost sites too, a…', 'Simulate any site on multiple devices simultaneously in a tab. Boost Development, UI/UX, &amp; QA, with real-time responsive previews.\r\nEmbrace the future of Responsive Design - Now with localhost su… [+2550 chars]', 'https://lh3.googleusercontent.com/zx4R5BD4BAAlAAWKltAFGjOFqJi2rK9BoyGelTGlrgdv8R0RNJW-hEx6uAAZJPVb5GWER2QLnZq0_p0lzSgvbHzN=s128-rj-sc0x00ffffff', 'show-hn-devtools-responsive-mode-on-steroids', '2023-11-26 12:11:14', '2023-11-26 12:11:14', NULL, NULL, NULL),
(81, 'Show HN: Blink – A Chrome Extension to Combat ADHD and Boost Focus', 'News', '2023-11-26 19:11:14', 'Hello HN!I\'ve just launched a new Chrome extension named Blink, which is inspired by a comment made by TheRealHB on HN. It suggests using a blinking LED to combat ADHD and maintain focus:https://news.ycombinator.com/item?id=38276107Blink replicates this techn…', 'Stay concentrated effortlessly with Blink\'s rhythmic visual cue.\r\nAre you struggling to stay concentrated while working or studying? Distractions are ever-present in our digital world, but with Blink… [+1273 chars]', 'https://lh3.googleusercontent.com/39U98NPJZPSRWkHC7Tqz7xY6SWOF51URv--BxWYwyVI29i_E8kykbUsoJevFOzch03fa0sB9PoPlz_zkALEEVAs2=s128-rj-sc0x00ffffff', 'show-hn-blink-a-chrome-extension-to-combat-adhd-and-boost-focus', '2023-11-26 12:11:14', '2023-11-26 12:11:14', NULL, NULL, NULL),
(88, 'Show HN: Mini – a simple and fast link shortener app', 'News', '2023-11-26 19:11:14', 'Article URL: https://play.google.com/store/apps/details?id=com.urlandhttpsshortener&hl=en_US\nComments URL: https://news.ycombinator.com/item?id=38302231\nPoints: 2\n# Comments: 0', 'Shorten long and unnecessarily large links and URLs with this extremely useful tool! Why bother yourself with copying and pasting a long and ugly link? With Mini you can make your URL shorter, smalle… [+835 chars]', 'https://play-lh.googleusercontent.com/fKUXec8xP9eze2WCkdyN4w6rCiTpfkfK3Eujg5CGN0DQuKfoOmQfQLXaGwi5kbsFNQ', 'show-hn-mini-a-simple-and-fast-link-shortener-app', '2023-11-26 12:11:14', '2023-11-26 12:11:14', NULL, NULL, NULL),
(94, 'International Comparison of Recommended File Formats', 'News', '2023-11-26 19:11:14', 'Open Preservation Foundation, Google Sheets, \nNov 16, 2023\n\n\n \n \r\nThis is a large spreadsheet of recommended file formats by international media preservation organizations. I found it interesting reading. The left hand column is a comprehensive list of file f…', 'The different file formats are scored in a uniform way to enable strict comparison between the practices of different institutions, internationally. The file formats may be represented in Submission … [+1613 chars]', 'https://lh7-us.googleusercontent.com/docs/AHkbwyKvww8_vZ_xYhVJKkBtXe3nLupVN7dbvL4wTRH4DUxjrj-Wkxw-B3S_kbMP3SZXwZ6Bmd1QXXyt9ewV9jxsrMxZTyAPmn21-8xdm_HLxLpzAA=w1200-h630-p', 'international-comparison-of-recommended-file-formats', '2023-11-26 12:11:14', '2023-11-26 12:11:14', NULL, NULL, NULL),
(100, 'Show HN: New Chrome Extension for Trustless Ethereum Balance Verification', 'News', '2023-11-26 19:11:14', 'Excited to share our latest experimental project: A Chrome extension that enables trustless verification of Ethereum token balances. It\'s a practical application of Ethereum light clients, reducing reliance on centralized entities like Etherscan by verifying …', 'Verify blockchain data presented at popular websites using Light Client technology\r\nDo you use Etherscan to see your token balances? \r\nDo you check your Metamask Portfolio?\r\nCentralized websites show… [+903 chars]', 'https://lh3.googleusercontent.com/0gGllcJyj5PVuvHxWkAoqwwfHLzomXIVPsR-By-PXkIo8Fm6CmrVIhTqaytyij1LOC9KgkKbxTTL5hzZBwJIvnJB3w=s128-rj-sc0x00ffffff', 'show-hn-new-chrome-extension-for-trustless-ethereum-balance-verification', '2023-11-26 12:11:14', '2023-11-26 12:11:14', NULL, NULL, NULL),
(102, '\'Reptar\', a new CPU vulnerability', 'News', '2023-11-26 19:11:14', 'A new CPU vulnerability, ‘Reptar,’ found by Google researchers, has been patched by Google and Intel. Here’s what you need to know.', 'This year, Google has seen an increase in the number of vulnerabilities impacting central processing units (CPU) across hardware systems. Two of the most notable of these vulnerabilities were disclos… [+2868 chars]', 'https://storage.googleapis.com/gweb-cloudblog-publish/images/DO_NOT_USE_Tdn2Cef.max-2500x2500.jpg', 'reptar-a-new-cpu-vulnerability', '2023-11-26 12:11:14', '2023-11-26 12:11:14', NULL, NULL, NULL),
(112, 'Show HN: Capture colors from the real world, to use in your projects', 'News', '2023-11-26 19:11:14', 'Article URL: https://play.google.com/store/apps/details?id=com.allot.colorcapture&hl=en_US\nComments URL: https://news.ycombinator.com/item?id=38245385\nPoints: 1\n# Comments: 0', 'Capture Colors Quickly:Grab any color from the real world with your phones camera. The app instantly gives you the color codes you need to use in your digital projects.Easy Color Organization:Keep al… [+235 chars]', 'https://play-lh.googleusercontent.com/Ty56qu8tayILorjmfWmmU4x-Oj6_zvKsUW9GtXrBUrvcqmLNLF97WpfWCPvq3vPx-w', 'show-hn-capture-colors-from-the-real-world-to-use-in-your-projects', '2023-11-26 12:11:14', '2023-11-26 12:11:14', NULL, NULL, NULL),
(116, 'Google Cloud TPU Multislice Training', 'News', '2023-11-26 19:11:14', 'Article URL: https://cloud.google.com/blog/products/compute/the-worlds-largest-distributed-llm-training-job-on-tpu-v5e\nComments URL: https://news.ycombinator.com/item?id=38222277\nPoints: 3\n# Comments: 0', 'We managed TPU capacity with Google Kubernetes Engine (GKE) and utilized XPK on top of GKE to orchestrate ML jobs. XPK handles creating clusters, resizes them as necessary, submits jobs into the GKE … [+5192 chars]', 'https://storage.googleapis.com/gweb-cloudblog-publish/images/compute_7XaotWm.max-2600x2600.jpg', 'google-cloud-tpu-multislice-training', '2023-11-26 12:11:14', '2023-11-26 12:11:14', NULL, NULL, NULL),
(124, 'Show HN: Quick Lookup selected text using ChatGPT in Chrome', 'News', '2023-11-26 19:11:14', 'Made this (using Gpt-4) a few days ago https://news.ycombinator.com/item?id=38147938 and now its on store. Been helping me a lot lately mainly to understand words and things here on HN. Also using this to summarize the text I don\'t want to read myself.\n\nComme…', 'Look up selected text using ChatGPT using your own prompts and show the results on the same page\r\nNOTE: You must have OpenAI API Key to use this extension.\r\nFirst open options, enter your API key and… [+273 chars]', 'https://lh3.googleusercontent.com/IAAKj13CSnXHnkCPuLtxKVx_0sHhN5ta2R4GC5NHB1pjbKkEyB0SaAr4msbW7DocS6vnm1x8b88GDNA8iPldQiFaUg=s128-rj-sc0x00ffffff', 'show-hn-quick-lookup-selected-text-using-chatgpt-in-chrome', '2023-11-26 12:11:14', '2023-11-26 12:11:14', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `status` text NOT NULL,
  `is_accept` varchar(255) NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT 'none',
  `ip_address` varchar(255) NOT NULL,
  `report_count` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `blog_id`, `user_id`, `content`, `status`, `is_accept`, `is_deleted`, `ip_address`, `report_count`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'ewag', 'show', 'not accepted', '', '127.0.0.1', '0', '2023-11-26 09:55:47', '2023-11-26 09:55:47'),
(2, 21, 1, 'ok', 'show', 'accepted', '', '127.0.0.1', '0', '2023-11-26 18:51:13', '2023-11-26 18:51:13'),
(3, 112, 1, 'gawe', 'show', 'not accepted', '', '127.0.0.1', '0', '2023-11-27 00:21:30', '2023-11-27 00:21:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Apple', 'apple', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(7, 'Samsung', 'samsung', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(8, 'Sony', 'sony', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(9, 'LG', 'lg', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(10, 'Panasonic', 'panasonic', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(11, 'Philips', 'philips', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(12, 'Microsoft', 'microsoft', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(13, 'Dell', 'dell', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(14, 'HP (Hewlett-Packard)', 'hp', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(15, 'Lenovo', 'lenovo', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(16, 'IBM', 'ibm', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(17, 'Toshiba', 'toshiba', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(18, 'Acer', 'acer', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(19, 'Asus', 'asus', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(20, 'Nokia', 'nokia', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(21, 'Motorola', 'motorola', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(22, 'Huawei', 'huawei', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(23, 'Xiaomi', 'xiaomi', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(24, 'Oppo', 'oppo', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(25, 'Vivo', 'vivo', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sku_id` varchar(255) NOT NULL,
  `session_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'hidden' COMMENT ' hidden, published, scheduled',
  `image` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `seo_description` mediumtext NOT NULL,
  `publish_date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `image`, `slug`, `title`, `description`, `seo_description`, `publish_date`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', 'published', 'images/nCInFxWuM3KvIce0akNGeFxVz1ZjbRv5QJ9Wgo6M.png', 'laptop', 'ewa', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare, mi in ornare elementum, libero nibh lacinia urna, quis convallis lorem erat at purus. Maecenas eu varius nisi.', 'gae', '30/09/2023', '2023-09-22 00:04:27', '2023-09-30 01:13:34'),
(4, 'Cameras', 'published', NULL, 'cameras', 'aewg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare, mi in ornare elementum, libero nibh lacinia urna, quis convallis lorem erat at purus. Maecenas eu varius nisi.', 'aewg', '22/09/2023', '2023-09-21 15:14:15', '2023-09-21 15:14:15'),
(6, 'smartphones', 'published', NULL, 'smartphones', 'agwe', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare, mi in ornare elementum, libero nibh lacinia urna, quis convallis lorem erat at purus. Maecenas eu varius nisi.', 'ăge', '24/11/2023', '2023-09-21 15:15:19', '2023-11-24 06:18:46'),
(7, 'drone', 'published', NULL, 'drone', 'geaw', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare, mi in ornare elementum, libero nibh lacinia urna, quis convallis lorem erat at purus. Maecenas eu varius nisi.', 'gaew', '22/09/2023', '2023-09-21 15:16:09', '2023-09-21 15:16:09'),
(8, 'headphones', 'published', NULL, 'headphones', 'aegw', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare, mi in ornare elementum, libero nibh lacinia urna, quis convallis lorem erat at purus. Maecenas eu varius nisi.', 'ăeg', '24/11/2023', '2023-09-21 15:16:41', '2023-11-24 06:18:54'),
(9, 'tvs', 'published', NULL, 'tvs', 'agew', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare, mi in ornare elementum, libero nibh lacinia urna, quis convallis lorem erat at purus. Maecenas eu varius nisi.', 'gưea', '22/09/2023', '2023-09-21 15:16:58', '2023-09-21 15:16:58'),
(10, 'speaker', 'published', NULL, 'speaker', 'agew', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare, mi in ornare elementum, libero nibh lacinia urna, quis convallis lorem erat at purus. Maecenas eu varius nisi.', 'ưaeg', '24/11/2023', '2023-09-21 15:17:16', '2023-11-24 06:19:01'),
(11, 'gamepad', 'published', NULL, 'gamepad', 'eawg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare, mi in ornare elementum, libero nibh lacinia urna, quis convallis lorem erat at purus. Maecenas eu varius nisi.', 'ưage', '22/09/2023', '2023-09-21 15:17:45', '2023-09-21 15:17:45'),
(12, 'smartwatch', 'published', NULL, 'smartwatch', 'aewg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare, mi in ornare elementum, libero nibh lacinia urna, quis convallis lorem erat at purus. Maecenas eu varius nisi.', 'agwe', '24/11/2023', '2023-09-21 15:18:18', '2023-11-24 06:19:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Red', 'ff0000', 1, '2023-09-25 05:58:40', '2023-09-25 05:58:47'),
(2, 'Pink', 'ee82ee', 1, '2023-09-25 05:58:53', '2023-09-25 05:58:53'),
(4, 'Purple', '6a5acd', 1, '2023-09-25 05:59:08', '2023-09-25 05:59:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `firstname`, `lastname`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'găeg', 'ăega', 'ăegaweg', 'ăegea', '2023-11-12 06:08:18', '2023-11-12 06:08:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `discount`, `is_active`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'ff0000', 12, 1, '2023-11-30 07:05:09', '2023-11-02 06:37:00', '2023-11-02 07:05:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_blogs`
--

CREATE TABLE `detail_blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login_histories`
--

CREATE TABLE `login_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `login_time` datetime NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `login_histories`
--

INSERT INTO `login_histories` (`id`, `user_id`, `login_time`, `ip_address`, `status`, `created_at`, `updated_at`) VALUES
(2, 26, '2023-11-18 17:06:47', '127.0.0.1', 'success', '2023-11-18 10:06:47', '2023-11-18 10:06:47'),
(3, 26, '2023-11-18 17:18:08', '127.0.0.1', 'success', '2023-11-18 10:18:08', '2023-11-18 10:18:08'),
(4, 1, '2023-11-18 17:18:52', '2001:ee0:4f48:a760:7916:c5a6:25d1:4756', 'success', '2023-11-18 10:18:52', '2023-11-18 10:18:52'),
(5, 1, '2023-11-18 17:25:23', '127.0.0.1', 'success', '2023-11-18 10:25:23', '2023-11-18 10:25:23'),
(6, 1, '2023-11-18 21:23:09', '127.0.0.1', 'success', '2023-11-18 14:23:09', '2023-11-18 14:23:09'),
(7, 1, '2023-11-19 02:49:25', '127.0.0.1', 'success', '2023-11-18 19:49:25', '2023-11-18 19:49:25'),
(8, 1, '2023-11-19 07:16:02', '127.0.0.1', 'success', '2023-11-19 00:16:02', '2023-11-19 00:16:02'),
(9, 1, '2023-11-20 01:24:02', '127.0.0.1', 'success', '2023-11-19 18:24:02', '2023-11-19 18:24:02'),
(10, 1, '2023-11-20 08:46:15', '127.0.0.1', 'success', '2023-11-20 01:46:15', '2023-11-20 01:46:15'),
(11, 1, '2023-11-21 02:00:08', '127.0.0.1', 'success', '2023-11-20 19:00:08', '2023-11-20 19:00:08'),
(12, 1, '2023-11-21 10:20:07', '127.0.0.1', 'success', '2023-11-21 03:20:07', '2023-11-21 03:20:07'),
(13, 1, '2023-11-22 11:59:08', '127.0.0.1', 'success', '2023-11-22 04:59:08', '2023-11-22 04:59:08'),
(14, 1, '2023-11-22 12:05:40', '127.0.0.1', 'success', '2023-11-22 05:05:40', '2023-11-22 05:05:40'),
(15, 1, '2023-11-22 12:53:58', '127.0.0.1', 'success', '2023-11-22 05:53:58', '2023-11-22 05:53:58'),
(16, 26, '2023-11-22 13:06:23', '127.0.0.1', 'success', '2023-11-22 06:06:23', '2023-11-22 06:06:23'),
(17, 1, '2023-11-22 14:07:52', '127.0.0.1', 'success', '2023-11-22 07:07:52', '2023-11-22 07:07:52'),
(18, 1, '2023-11-23 09:58:35', '127.0.0.1', 'success', '2023-11-23 02:58:35', '2023-11-23 02:58:35'),
(19, 1, '2023-11-23 21:58:11', '127.0.0.1', 'success', '2023-11-23 14:58:11', '2023-11-23 14:58:11'),
(20, 1, '2023-11-24 10:16:53', '127.0.0.1', 'success', '2023-11-24 03:16:53', '2023-11-24 03:16:53'),
(21, 1, '2023-11-24 10:24:17', '127.0.0.1', 'success', '2023-11-24 03:24:17', '2023-11-24 03:24:17'),
(22, 1, '2023-11-24 18:30:32', '127.0.0.1', 'success', '2023-11-24 11:30:32', '2023-11-24 11:30:32'),
(23, 1, '2023-11-25 12:53:17', '127.0.0.1', 'success', '2023-11-25 05:53:17', '2023-11-25 05:53:17'),
(24, 1, '2023-11-25 12:56:09', '127.0.0.1', 'success', '2023-11-25 05:56:09', '2023-11-25 05:56:09'),
(25, 1, '2023-11-25 12:58:03', '127.0.0.1', 'success', '2023-11-25 05:58:03', '2023-11-25 05:58:03'),
(26, 1, '2023-11-25 12:59:50', '127.0.0.1', 'success', '2023-11-25 05:59:50', '2023-11-25 05:59:50'),
(27, 1, '2023-11-25 13:16:52', '127.0.0.1', 'success', '2023-11-25 06:16:52', '2023-11-25 06:16:52'),
(28, 26, '2023-11-25 13:18:51', '127.0.0.1', 'success', '2023-11-25 06:18:51', '2023-11-25 06:18:51'),
(29, 26, '2023-11-25 13:20:11', '127.0.0.1', 'success', '2023-11-25 06:20:11', '2023-11-25 06:20:11'),
(30, 1, '2023-11-25 13:27:38', '127.0.0.1', 'success', '2023-11-25 06:27:38', '2023-11-25 06:27:38'),
(31, 1, '2023-11-25 13:27:39', '127.0.0.1', 'success', '2023-11-25 06:27:39', '2023-11-25 06:27:39'),
(32, 1, '2023-11-25 14:54:08', '127.0.0.1', 'success', '2023-11-25 07:54:08', '2023-11-25 07:54:08'),
(33, 1, '2023-11-25 14:54:09', '127.0.0.1', 'success', '2023-11-25 07:54:09', '2023-11-25 07:54:09'),
(34, 1, '2023-11-26 16:30:04', '127.0.0.1', 'success', '2023-11-26 09:30:04', '2023-11-26 09:30:04'),
(35, 1, '2023-11-26 16:30:05', '127.0.0.1', 'success', '2023-11-26 09:30:05', '2023-11-26 09:30:05'),
(36, 1, '2023-11-27 07:23:15', '127.0.0.1', 'success', '2023-11-27 00:23:15', '2023-11-27 00:23:15'),
(37, 1, '2023-11-27 07:23:15', '127.0.0.1', 'success', '2023-11-27 00:23:15', '2023-11-27 00:23:15'),
(38, 26, '2023-11-27 07:37:40', '127.0.0.1', 'success', '2023-11-27 00:37:40', '2023-11-27 00:37:40'),
(39, 26, '2023-11-27 07:37:40', '127.0.0.1', 'success', '2023-11-27 00:37:40', '2023-11-27 00:37:40'),
(40, 1, '2023-11-27 07:43:26', '127.0.0.1', 'success', '2023-11-27 00:43:26', '2023-11-27 00:43:26'),
(41, 1, '2023-11-27 07:43:26', '127.0.0.1', 'success', '2023-11-27 00:43:26', '2023-11-27 00:43:26'),
(42, 1, '2023-11-27 21:08:13', '127.0.0.1', 'success', '2023-11-27 14:08:13', '2023-11-27 14:08:13'),
(43, 1, '2023-11-27 21:08:13', '127.0.0.1', 'success', '2023-11-27 14:08:13', '2023-11-27 14:08:13'),
(44, 1, '2023-11-27 21:08:28', '127.0.0.1', 'success', '2023-11-27 14:08:28', '2023-11-27 14:08:28'),
(45, 1, '2023-11-27 21:08:28', '127.0.0.1', 'success', '2023-11-27 14:08:28', '2023-11-27 14:08:28'),
(46, 1, '2023-11-27 21:30:07', '127.0.0.1', 'success', '2023-11-27 14:30:07', '2023-11-27 14:30:07'),
(47, 1, '2023-11-27 21:30:08', '127.0.0.1', 'success', '2023-11-27 14:30:08', '2023-11-27 14:30:08'),
(48, 1, '2023-11-28 11:01:12', '127.0.0.1', 'success', '2023-11-28 04:01:12', '2023-11-28 04:01:12'),
(49, 1, '2023-11-28 11:01:13', '127.0.0.1', 'success', '2023-11-28 04:01:13', '2023-11-28 04:01:13'),
(50, 1, '2023-11-28 15:31:51', '127.0.0.1', 'success', '2023-11-28 08:31:51', '2023-11-28 08:31:51'),
(51, 1, '2023-11-28 15:31:52', '127.0.0.1', 'success', '2023-11-28 08:31:52', '2023-11-28 08:31:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_15_021909_create_brands_table', 1),
(6, '2023_09_16_231405_add_details_to_users_table', 1),
(7, '2023_09_17_003526_create_categories_table', 1),
(8, '2023_09_19_023916_create_sub_categories_table', 1),
(9, '2023_09_19_075123_create_products_table', 1),
(10, '2023_09_19_114346_create_product_images_table', 1),
(11, '2023_09_21_075538_create_colors_table', 1),
(12, '2023_09_21_075605_create_product_colors_table', 1),
(13, '2023_09_22_055403_create_sliders_table', 1),
(14, '2023_09_25_023013_add_to_products_table', 2),
(15, '2023_09_26_024747_create_wishlists_table', 2),
(16, '2023_09_29_041357_create_carts_table', 3),
(18, '2023_09_29_081327_create_orders_table', 5),
(19, '2023_09_29_081335_create_order_items_table', 6),
(20, '2023_09_29_082737_add_to_order_table', 7),
(21, '2023_09_29_115137_add_id_to_orders_table', 8),
(22, '2023_10_01_054859_add_to_orders_table', 9),
(23, '2023_10_02_032715_add_to_sub_categories_table', 10),
(24, '2023_11_02_062149_create_wallets_table', 11),
(25, '2023_11_02_062731_create_transaction_table', 12),
(26, '2023_11_02_072524_add_to_transaction_table', 13),
(27, '2023_11_02_073631_add_method_to_transaction_table', 14),
(28, '2023_11_02_130743_create_coupons_table', 15),
(29, '2023_11_02_123246_create_blogs_table', 16),
(30, '2023_11_02_144609_create_detail_blogs_table', 16),
(31, '2023_11_03_013952_add_to_blogs_table', 17),
(32, '2023_11_12_125046_create_contacts_table', 18),
(33, '2023_11_12_142548_create_customers_table', 19),
(34, '2023_11_13_023503_add_otp_to_users_table', 20),
(35, '2023_11_13_023504_add_otp_to_users_table', 21),
(36, '2023_11_13_023505_add_otp_to_users_table', 22),
(37, '2023_11_16_093119_create_login_histories_table', 23),
(38, '2023_11_16_122339_create_product_comments_table', 23),
(39, '2023_11_16_164426_add_info_account_to_users_table', 24),
(40, '2023_11_18_01_add_facebook_id_to_users_table', 25),
(41, '2023_11_18_113749_add_google_id_to_users_table', 26),
(42, '2023_11_18_145638_add_status_to_blogs_table', 27),
(43, '2023_11_18_211929_create_variants_table', 28),
(47, '2023_11_18_212116_create_variant_values_table', 29),
(48, '2023_11_18_212126_create_variant_values_table', 30),
(49, '2023_11_18_232333_add_to_variant_values_table', 30),
(51, '2023_11_18_222285_create_skus_table', 31),
(52, '2023_11_20_104351_create_sku_variants_table', 32),
(55, '2023_09_29_041367_create_carts_update_table', 35),
(56, '2023_11_21_040319_add_sku_id_to_carts_table', 36),
(58, '2023_09_29_081336_create_order_items_table', 37),
(59, '2023_11_21_040541_add_sku_id_to_order_items_table', 37),
(60, '2023_11_19_024450_add_link_to_blogs_table', 38),
(61, '2023_11_25_060213_add_session_to_carts_table', 39),
(62, '2023_11_26_053002_create_blog_comments_table', 40),
(63, '2023_11_27_004716_add_discount_to_orders_table', 41);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT 'individual',
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT 'Chờ xác nhận' COMMENT 'pending, confirm, received',
  `payment_mode` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shipping_price` decimal(16,2) NOT NULL DEFAULT 0.00,
  `user_id` int(11) NOT NULL,
  `total_amount` decimal(16,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `firstname`, `lastname`, `country`, `address`, `city`, `zipcode`, `company`, `email`, `phone`, `status`, `payment_mode`, `created_at`, `updated_at`, `shipping_price`, `user_id`, `total_amount`, `discount`) VALUES
(66, 'faweg', 'ăegaw', 'AT', 'HCM', 'gaearg', '54336', 'gaweg', 'trangiangzxc@gmail.com', '0589317493', 'Chờ xác nhận', 'cash', '2023-11-02 08:21:53', '2023-11-02 08:21:53', 3.96, 11, 351.96, 0.00),
(67, 'faweg', 'ăegaw', 'AT', 'HCM', 'gaearg', '54336', 'gaweg', 'trangiangzxc@gmail.com', '0589317493', 'Đang giao hàng', 'cash', '2023-11-02 08:24:03', '2023-11-24 08:03:11', 1.17, 11, 103.99, 0.00),
(68, 'faweg', 'ăegaw', 'AT', 'HCM', 'gaearg', '54336', 'gaweg', 'trangiangzxc@gmail.com', '0589317493', 'Đang giao hàng', 'cash', '2023-11-03 01:04:26', '2023-11-24 07:30:39', 5.99, 11, 532.39, 0.00),
(71, 'faweg', 'ăegaw', 'AT', 'HCM', 'gaearg', '54336', 'gaweg', 'trangiangzxc@gmail.com', '0589317493', 'Thành công', 'cash', '2023-11-20 22:19:39', '2023-11-24 07:31:04', 0.06, 1, 5.33, 0.00),
(72, 'faweg', 'ăegaw', 'AT', 'HCM', 'gaearg', '54336', 'gaweg', 'trangiangzxc@gmail.com', '0589317493', 'Đã xác nhận', 'wallet', '2023-11-21 04:35:23', '2023-11-22 00:20:15', 13.80, 1, 1226.54, 0.00),
(73, 'faweg', 'ăegaw', 'AT', 'HCM', 'gaearg', '54336', 'gaweg', 'trangiangzxc@gmail.com', '0589317493', 'Đã xác nhận', 'bank', '2023-11-21 04:48:24', '2023-11-22 00:20:47', 6.90, 1, 696.90, 0.00),
(74, 'faweg', 'ăegaw', 'AT', 'HCM', 'gaearg', '54336', 'gaweg', 'trangiangzxc@gmail.com', '0589317493', 'Đã xác nhận', 'cash', '2023-11-22 00:15:03', '2023-11-22 00:19:53', 46.46, 1, 4129.36, 0.00),
(75, 'faweg', 'ăegaw', 'AT', 'HCM', 'gaearg', '54336', 'gaweg', 'trangiangzxc@gmail.com', '0589317493', 'Đã hủy', 'bank', '2023-11-23 20:18:31', '2023-11-24 07:16:35', 11.01, 1, 1112.01, 0.00),
(76, 'faweg', 'ăegaw', 'AT', 'HCM', 'gaearg', '54336', 'gaweg', 'trangiangzxc@gmail.com', '0589317493', 'Đã hủy', 'bank', '2023-11-23 20:20:54', '2023-11-24 07:16:26', 10.99, 1, 1109.99, 0.00),
(77, 'faweg', 'ăegaw', 'AT', 'HCM', 'gaearg', '54336', 'gaweg', 'trangiangzxc@gmail.com', '0589317493', 'Đã hủy', 'bank', '2023-11-23 20:24:01', '2023-11-24 07:16:10', 45.68, 1, 4613.68, 0.00),
(78, 'faweg', 'ăegaw', 'AT', 'HCM', 'gaearg', '54336', 'gaweg', 'trangiangzxc@gmail.com', '0589317493', 'Đã hủy', 'bank', '2023-11-23 20:24:24', '2023-11-24 07:52:18', 45.68, 1, 45.68, 0.00),
(79, 'faweg', 'ăegaw', 'AT', 'HCM', 'gaearg', '54336', 'gaweg', 'trangiangzxc@gmail.com', '0589317493', 'Thành công', 'cash', '2023-11-24 06:10:50', '2023-11-24 07:23:56', 10.99, 1, 1109.99, 0.00),
(80, 'faweg', 'ăegaw', 'AT', 'HCM', 'gaearg', '54336', 'gaweg', 'trangiangzxc@gmail.com', '0589317493', 'Thành công', 'bank', '2023-11-24 07:17:36', '2023-11-24 07:28:48', 10.99, 1, 1109.99, 0.00),
(81, 'faweg', 'ăegaw', 'AT', 'HCM', 'gaearg', '54336', 'gaweg', 'trangiangzxc@gmail.com', '0589317493', 'Đã hủy', 'bank', '2023-11-24 08:00:40', '2023-11-24 08:01:56', 21.98, 1, 2219.98, 0.00),
(82, 'faweg', 'ăegaw', 'AT', 'HCM', 'gaearg', '54336', 'gaweg', 'trangiangzxc@gmail.com', '0589317493', 'Chờ xác nhận', 'bank', '2023-11-24 23:32:03', '2023-11-24 23:32:03', 10.99, 1, 1109.99, 0.00),
(83, 'faweg', 'ăegaw', 'AT', 'HCM', 'gaearg', '54336', 'gaweg', 'trangiangzxc@gmail.com', '0589317493', 'Đã hủy', 'bank', '2023-11-26 17:22:27', '2023-11-26 17:33:26', 34.97, 1, 3531.97, 0.00),
(121, 'faweg', 'ăegaw', 'AT', 'HCM', 'gaearg', '54336', 'gaweg', 'trangiangzxc@gmail.com', '0589317493', 'Đã hủy', 'bank', '2023-11-26 19:10:50', '2023-11-27 07:41:10', 21.98, 1, 1953.58, 237.07),
(122, 'faweg', 'ăegaw', 'AT', 'HCM', 'gaearg', '54336', 'gaweg', 'trangiangzxc@gmail.com', '0589317493', 'Chưa thanh toán', 'bank', '2023-11-26 19:15:46', '2023-11-26 19:15:50', 10.99, 1, 976.79, 118.53),
(123, 'faweg', 'ăegaw', 'AT', 'HCM', 'gaearg', '54336', 'gaweg', 'trangiangzxc@gmail.com', '0589317493', 'Đã thanh toán', 'wallet', '2023-11-27 08:06:25', '2023-11-27 08:06:25', 37.66, 1, 3347.22, 406.19),
(124, 'faweg', 'ăegaw', 'AT', 'HCM', 'gaearg', '54336', 'gaweg', 'trangiangzxc@gmail.com', '0589317493', 'Chờ xác nhận', 'cash', '2023-11-28 02:39:26', '2023-11-28 02:39:26', 26.66, 1, 2369.54, 287.54),
(125, 'faweg', 'ăegaw', 'AT', 'HCM', 'gaearg', '54336', 'gaweg', 'trangiangzxc@gmail.com', '0589317493', 'Đã hủy', 'wallet', '2023-11-28 02:40:42', '2023-11-28 02:40:55', 8.99, 1, 799.03, 96.96);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sku_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`, `sku_id`) VALUES
(1, 70, 100, 5, 234, '2023-11-20 22:18:18', '2023-11-20 22:18:18', '6'),
(2, 70, 100, 24, 2, '2023-11-20 22:18:18', '2023-11-20 22:18:18', '5'),
(3, 71, 100, 3, 2, '2023-11-20 22:19:39', '2023-11-20 22:19:39', '5'),
(4, 72, 104, 4, 345, '2023-11-21 04:35:23', '2023-11-21 04:35:23', '23'),
(5, 73, 104, 2, 345, '2023-11-21 04:48:24', '2023-11-21 04:48:24', '23'),
(6, 74, 10, 1, 1099, '2023-11-22 00:15:03', '2023-11-22 00:15:03', '25'),
(7, 74, 8, 1, 3547, '2023-11-22 00:15:03', '2023-11-22 00:15:03', '33'),
(8, 75, 10, 1, 1099, '2023-11-23 20:18:31', '2023-11-23 20:18:31', '25'),
(9, 75, 100, 1, 2, '2023-11-23 20:18:31', '2023-11-23 20:18:31', '5'),
(10, 76, 10, 1, 1099, '2023-11-23 20:20:54', '2023-11-23 20:20:54', '25'),
(11, 77, 8, 1, 4568, '2023-11-23 20:24:01', '2023-11-23 20:24:01', '54'),
(12, 79, 10, 1, 1099, '2023-11-24 06:10:50', '2023-11-24 06:10:50', '25'),
(13, 80, 10, 1, 1099, '2023-11-24 07:17:36', '2023-11-24 07:17:36', '25'),
(14, 81, 10, 2, 1099, '2023-11-24 08:00:40', '2023-11-24 08:00:40', '25'),
(15, 82, 10, 1, 1099, '2023-11-24 23:32:03', '2023-11-24 23:32:03', '25'),
(16, 83, 10, 2, 1199, '2023-11-26 17:22:27', '2023-11-26 17:22:27', '26'),
(17, 83, 10, 1, 1099, '2023-11-26 17:22:27', '2023-11-26 17:22:27', '25'),
(18, 84, 10, 1, 1099, '2023-11-26 17:36:38', '2023-11-26 17:36:38', '25'),
(19, 85, 10, 2, 1099, '2023-11-26 17:39:23', '2023-11-26 17:39:23', '25'),
(20, 86, 10, 1, 1099, '2023-11-26 17:46:06', '2023-11-26 17:46:06', '25'),
(21, 87, 10, 1, 1099, '2023-11-26 17:50:38', '2023-11-26 17:50:38', '25'),
(22, 88, 10, 1, 1099, '2023-11-26 17:52:28', '2023-11-26 17:52:28', '25'),
(23, 89, 10, 1, 1099, '2023-11-26 17:54:38', '2023-11-26 17:54:38', '25'),
(24, 91, 10, 1, 1099, '2023-11-26 17:56:31', '2023-11-26 17:56:31', '25'),
(25, 92, 10, 1, 1099, '2023-11-26 17:58:20', '2023-11-26 17:58:20', '25'),
(26, 93, 10, 1, 1099, '2023-11-26 17:59:51', '2023-11-26 17:59:51', '25'),
(27, 96, 10, 1, 1099, '2023-11-26 18:01:28', '2023-11-26 18:01:28', '25'),
(28, 98, 10, 1, 1099, '2023-11-26 18:03:51', '2023-11-26 18:03:51', '25'),
(29, 100, 10, 1, 1099, '2023-11-26 18:04:37', '2023-11-26 18:04:37', '25'),
(30, 101, 10, 1, 1099, '2023-11-26 18:06:10', '2023-11-26 18:06:10', '25'),
(31, 102, 10, 1, 1199, '2023-11-26 18:09:14', '2023-11-26 18:09:14', '26'),
(32, 104, 10, 1, 1099, '2023-11-26 18:09:52', '2023-11-26 18:09:52', '25'),
(33, 105, 10, 1, 1099, '2023-11-26 18:13:13', '2023-11-26 18:13:13', '25'),
(34, 107, 10, 1, 1099, '2023-11-26 18:15:31', '2023-11-26 18:15:31', '25'),
(35, 108, 10, 1, 1099, '2023-11-26 18:16:45', '2023-11-26 18:16:45', '25'),
(36, 110, 10, 1, 1199, '2023-11-26 18:18:04', '2023-11-26 18:18:04', '26'),
(37, 111, 10, 1, 1099, '2023-11-26 18:18:46', '2023-11-26 18:18:46', '25'),
(38, 112, 10, 1, 899, '2023-11-26 18:19:52', '2023-11-26 18:19:52', '28'),
(39, 113, 10, 1, 1099, '2023-11-26 18:20:16', '2023-11-26 18:20:16', '25'),
(40, 114, 10, 1, 1199, '2023-11-26 18:20:55', '2023-11-26 18:20:55', '26'),
(41, 115, 10, 1, 1099, '2023-11-26 18:22:34', '2023-11-26 18:22:34', '25'),
(42, 116, 10, 1, 1099, '2023-11-26 18:23:57', '2023-11-26 18:23:57', '25'),
(43, 117, 10, 1, 1099, '2023-11-26 18:26:12', '2023-11-26 18:26:12', '25'),
(44, 118, 10, 1, 1099, '2023-11-26 18:27:27', '2023-11-26 18:27:27', '25'),
(45, 119, 10, 1, 1099, '2023-11-26 18:30:42', '2023-11-26 18:30:42', '25'),
(46, 120, 10, 2, 1099, '2023-11-26 18:32:44', '2023-11-26 18:32:44', '25'),
(47, 121, 10, 2, 1099, '2023-11-26 19:10:50', '2023-11-26 19:10:50', '25'),
(48, 122, 10, 1, 1099, '2023-11-26 19:15:46', '2023-11-26 19:15:46', '25'),
(49, 123, 10, 1, 1199, '2023-11-27 08:06:25', '2023-11-27 08:06:25', '26'),
(50, 123, 10, 1, 899, '2023-11-27 08:06:25', '2023-11-27 08:06:25', '28'),
(51, 123, 10, 1, 978, '2023-11-27 08:06:25', '2023-11-27 08:06:25', '29'),
(52, 123, 10, 1, 690, '2023-11-27 08:06:25', '2023-11-27 08:06:25', '32'),
(53, 124, 11, 1, 1567, '2023-11-28 02:39:26', '2023-11-28 02:39:26', '120'),
(54, 124, 10, 1, 1099, '2023-11-28 02:39:26', '2023-11-28 02:39:26', '25'),
(55, 125, 10, 1, 899, '2023-11-28 02:40:42', '2023-11-28 02:40:42', '28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `small_description` mediumtext NOT NULL,
  `description` longtext NOT NULL,
  `price` int(11) NOT NULL,
  `promotion_price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 0,
  `hot` tinyint(4) NOT NULL,
  `status` varchar(255) NOT NULL,
  `publish_date` varchar(255) DEFAULT NULL,
  `meta_keyword` mediumtext NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `sub_category_id`, `name`, `brand_id`, `slug`, `brand`, `small_description`, `description`, `price`, `promotion_price`, `quantity`, `hot`, `status`, `publish_date`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 4, 'Anker 7-in-1 USB C Hub Adapter', 6, 'anker-7-in-1-usb-c-hub-adapter', NULL, 'Products with electrical plugs are designed for use in the US. Outlets and voltage differ internationally and this product may require an adapter or converter for use in your destination. Please check compatibility before purchasing.', '<ul>\r\n	<li>4.5 inch HD Touch Screen (1280 x 720)</li>\r\n	<li>Android 4.4 KitKat OS</li>\r\n	<li>1.4 GHz Quad Core&trade; Processor</li>\r\n	<li>20 MP Electro and 28 megapixel CMOS rear camera</li>\r\n</ul>', 59, 39, 0, 0, 'published', '02/10/2023', 'gaew', 'waeg', '2023-09-24 13:05:57', '2023-10-01 18:39:50'),
(5, 4, 'MSI GE66 Raider', 7, 'msi-ge66-raider', NULL, 'Products with electrical plugs are designed for use in the US. Outlets and voltage differ internationally and this product may require an adapter or converter for use in your destination. Please check compatibility before purchasing..', '<ul>\r\n	<li>4.5 inch HD Touch Screen (1280 x 720)</li>\r\n	<li>Android 4.4 KitKat OS</li>\r\n	<li>1.4 GHz Quad Core&trade; Processor</li>\r\n	<li>20 MP Electro and 28 megapixel CMOS rear camera<br />\r\n	&nbsp;</li>\r\n</ul>', 1599, 1499, 0, 0, 'published', '21/11/2023', 'găega', 'gưae', '2023-10-01 14:24:40', '2023-11-21 08:33:41'),
(6, 4, 'Razer Blade 15', 7, 'razer-blade-15', NULL, 'Products with electrical plugs are designed for use in the US. Outlets and voltage differ internationally and this product may require an adapter or converter for use in your destination. Please check compatibility before purchasing..', '<ul>\r\n	<li>4.5 inch HD Touch Screen (1280 x 720)</li>\r\n	<li>Android 4.4 KitKat OS</li>\r\n	<li>1.4 GHz Quad Core&trade; Processor</li>\r\n	<li>20 MP Electro and 28 megapixel CMOS rear camera<br />\r\n	&nbsp;</li>\r\n</ul>', 1799, 1499, 0, 0, 'published', '02/10/2023', 'găega', 'gưae', '2023-10-01 14:26:44', '2023-10-01 14:26:44'),
(7, 4, 'ASUS ROG Zephyrus G14', 7, 'asus-rog-zephyrus-g14', NULL, 'Products with electrical plugs are designed for use in the US. Outlets and voltage differ internationally and this product may require an adapter or converter for use in your destination. Please check compatibility before purchasing..', '<ul>\r\n	<li>4.5 inch HD Touch Screen (1280 x 720)</li>\r\n	<li>Android 4.4 KitKat OS</li>\r\n	<li>1.4 GHz Quad Core&trade; Processor</li>\r\n	<li>20 MP Electro and 28 megapixel CMOS rear camera<br />\r\n	&nbsp;</li>\r\n</ul>', 1299, 1149, 0, 0, 'published', '21/11/2023', 'găega', 'gưae', '2023-10-01 14:30:18', '2023-11-21 08:30:07'),
(8, 4, 'Skytech Gaming Blaze II', 7, 'hp-omen-15', NULL, 'Products with electrical plugs are designed for use in the US. Outlets and voltage differ internationally and this product may require an adapter or converter for use in your destination. Please check compatibility before purchasing..', '<ul>\r\n	<li>4.5 inch HD Touch Screen (1280 x 720)</li>\r\n	<li>Android 4.4 KitKat OS</li>\r\n	<li>1.4 GHz Quad Core&trade; Processor</li>\r\n	<li>20 MP Electro and 28 megapixel CMOS rear camera<br />\r\n	&nbsp;</li>\r\n</ul>', 1399, 1249, 0, 0, 'published', '21/11/2023', 'găega', 'gưae', '2023-10-01 14:32:57', '2023-11-21 07:37:43'),
(9, 16, 'Forerunner 945 Advanced GPS Running Smartwatch', 7, 'garmin-forerunner-945-advanced-gps-running-smartwatch', NULL, 'Products with electrical plugs are designed for use in the US. Outlets and voltage differ internationally and this product may require an adapter or converter for use in your destination. Please check compatibility before purchasing..', '<ul>\r\n	<li>4.5 inch HD Touch Screen (1280 x 720)</li>\r\n	<li>Android 4.4 KitKat OS</li>\r\n	<li>1.4 GHz Quad Core&trade; Processor</li>\r\n	<li>20 MP Electro and 28 megapixel CMOS rear camera<br />\r\n	&nbsp;</li>\r\n</ul>', 1399, 599, 0, 0, 'published', '02/10/2023', 'găega', 'gưae', '2023-10-01 14:41:01', '2023-10-01 14:41:01'),
(10, 18, 'Fitbit Versa 3 Health & Fitness Smartwatch with GPS', 7, 'fitbit-versa-3-health-fitness-smartwatch-with-gps', NULL, 'Products with electrical plugs are designed for use in the US. Outlets and voltage differ internationally and this product may require an adapter or converter for use in your destination. Please check compatibility before purchasing..', '<ul>\r\n	<li>4.5 inch HD Touch Screen (1280 x 720)</li>\r\n	<li>Android 4.4 KitKat OS</li>\r\n	<li>1.4 GHz Quad Core&trade; Processor</li>\r\n	<li>20 MP Electro and 28 megapixel CMOS rear camera</li>\r\n</ul>', 1399, 599, 0, 0, 'published', '02/10/2023', 'găega', 'gưae', '2023-10-01 14:59:16', '2023-10-01 14:59:16'),
(11, 17, 'Samsung Galaxy Watch4 Classic LTE', 7, 'samsung-galaxy-watch4-classic-lte', NULL, 'Products with electrical plugs are designed for use in the US. Outlets and voltage differ internationally and this product may require an adapter or converter for use in your destination. Please check compatibility before purchasing..', '<ul>\r\n	<li>4.5 inch HD Touch Screen (1280 x 720)</li>\r\n	<li>Android 4.4 KitKat OS</li>\r\n	<li>1.4 GHz Quad Core&trade; Processor</li>\r\n	<li>20 MP Electro and 28 megapixel CMOS rear camera</li>\r\n</ul>', 1399, 599, 0, 0, 'published', '02/10/2023', 'găega', 'gưae', '2023-10-01 15:00:20', '2023-10-01 15:00:20'),
(12, 13, 'OUKITEL WP20', 7, 'oukitel-wp20', NULL, 'Dung lượng lưu trữ\r\n32GB\r\nTình trạng\r\nKhác\r\nRAM\r\n4GB', '<p>🥇【Cost-effective Rugged Mobile Phone - OUKITEL WP20】Ang Pinakabagong Rugged Phone ng OUKITEL sa 2022! Naglalayong sa kahinaan ng &quot;mabigat na mobile phone&quot; ng mga katulad na produkto ng Rugged, ang aming laki ay sadyang dinisenyo upang maging laki ng palad, ang timbang ay portable at praktikal para sa iyong buhay at panlabas na mga gawain. OUKITEL WP20 murang telepono ay dumating sa tatlong kulay: Kalmado Black, Tropical Orange at Eco Green.</p>', 1200, 1000, 0, 0, 'published', '16/11/2023', 'Điện thoại cầm tay chắc chắn', 'Điện thoại cầm tay chắc chắn', '2023-11-16 08:21:55', '2023-11-16 08:21:55'),
(13, 13, 'Samsung Galaxy S21', 7, 'samsung-galaxy-s21', NULL, 'Dung lượng lưu trữ\r\n128GB\r\nTình trạng\r\nMới 100%\r\nRAM\r\n8GB', '<p>The Samsung Galaxy S21 is the latest flagship smartphone from Samsung. It features a stunning display, powerful performance, and a versatile camera system. With its sleek design and premium build quality, the Galaxy S21 is a top choice for smartphone enthusiasts.</p>', 1500, 1300, 0, 0, 'published', '28/11/2023', 'Samsung, Galaxy S21, smartphone', 'The Samsung Galaxy S21 is a high-end smartphone with a powerful camera and advanced features.', '2023-11-16 01:21:55', '2023-11-28 01:33:44'),
(14, 13, 'iPhone 13 Pro', 7, 'iphone-13-pro', NULL, 'Dung lượng lưu trữ\r\n256GB\r\nTình trạng\r\nMới 100%\r\nRAM\r\n8GB', '<p>The iPhone 13 Pro is Apple&#39;s latest flagship smartphone. It features a stunning Super Retina XDR display, a powerful A15 Bionic chip, and an advanced camera system. With its sleek design and premium build quality, the iPhone 13 Pro is a top choice for iPhone fans.</p>', 1800, 1700, 0, 0, 'published', '28/11/2023', 'Apple, iPhone 13 Pro, smartphone', 'The iPhone 13 Pro is a high-end smartphone with advanced features and a powerful camera.', '2023-11-16 01:21:55', '2023-11-28 01:37:11'),
(16, 13, 'OUKITEL WP210', 7, 'oukitel-wp210', NULL, 'Dung lượng lưu trữ\r\n32GB\r\nTình trạng\r\nKhác\r\nRAM\r\n4GB', '<p>🥇【Cost-effective Rugged Mobile Phone - OUKITEL WP20】Ang Pinakabagong Rugged Phone ng OUKITEL sa 2022! Naglalayong sa kahinaan ng &quot;mabigat na mobile phone&quot; ng mga katulad na produkto ng Rugged, ang aming laki ay sadyang dinisenyo upang maging laki ng palad, ang timbang ay portable at praktikal para sa iyong buhay at panlabas na mga gawain. OUKITEL WP20 murang telepono ay dumating sa tatlong kulay: Kalmado Black, Tropical Orange at Eco Green.</p>', 1200, 1000, 0, 0, 'published', '28/11/2023', 'Điện thoại cầm tay chắc chắn', 'Điện thoại cầm tay chắc chắn', '2023-11-16 01:21:55', '2023-11-28 02:13:25'),
(19, 13, 'Xiaomi Redmi Note 10', 9, 'xiaomi-redmi-note-10', NULL, 'Dung lượng lưu trữ\r\n128GB\r\nTình trạng\r\nMới 100%\r\nRAM\r\n6GB', '<p>The Xiaomi Redmi Note 10 is a budget-friendly smartphone with impressive features. It boasts a large display, powerful processor, and a high-resolution camera. With its affordable price tag, the Redmi Note 10 is a popular choice among budget-conscious consumers.</p>', 800, 700, 0, 0, 'published', '16/11/2023', 'Xiaomi, Redmi Note 10, smartphone', 'The Xiaomi Redmi Note 10 is a budget-friendly smartphone with a large display and powerful performance.', '2023-11-16 01:21:55', '2023-11-16 01:21:55'),
(20, 14, 'Sony PlayStation 5', 10, 'sony-playstation-5', NULL, 'Dung lượng lưu trữ\r\n825GB\r\nTình trạng\r\nMới 100%', '<p>The Sony PlayStation 5 is the latest gaming console from Sony. It offers stunning graphics, fast load times, and a wide range of games. With its innovative features and powerful hardware, the PlayStation 5 delivers an immersive gaming experience.</p>', 1500, 1400, 0, 0, 'published', '28/11/2023', 'Sony, PlayStation 5, gaming console', 'The Sony PlayStation 5 is a high-end gaming console with advanced graphics and innovative features.', '2023-11-16 01:21:55', '2023-11-28 02:10:32'),
(21, 15, 'Dell XPS 15', 11, 'dell-xps-15', NULL, 'Dung lượng lưu trữ\r\n1TB\r\nTình trạng\r\nMới 100%\r\nRAM\r\n16GB', '<p>The Dell XPS 15 is a high-performance laptop with a stunning display and powerful hardware. It features a sleek design, excellent build quality, and long battery life. Whether youre a professional or a casual user, the Dell XPS 15 offers a great computing experience.</p>', 2000, 1900, 0, 0, 'published', '16/11/2023', 'Dell, XPS 15, laptop', 'The Dell XPS 15 is a high-performance laptop with a stunning display and powerful hardware.', '2023-11-16 01:21:55', '2023-11-16 01:21:55'),
(29, 15, 'Samsung Galaxy S21', 6, 'samsung-galaxy-s21', 'Samsung', 'găgwea', '<p>The Samsung Galaxy S21 is a flagship Android smartphone with a powerful processor and a stunning display. It features a high-resolution camera, fast charging capabilities, and a sleek design.</p>', 999, 899, 50, 0, 'published', '28/11/2023', 'agew', 'agew', '2023-11-16 15:37:08', '2023-11-28 02:06:26'),
(30, 15, 'Google Pixel 6', 6, 'google-pixel-6', 'Google', 'aaa', '<p>The Google Pixel 6 is an Android smartphone that offers a pure Android experience with fast performance and regular software updates. It comes with a top-of-the-line camera, a vibrant OLED display, and a long-lasting battery.1</p>', 799, 111, 30, 0, 'published', '16/11/2023', '11', '111', '2023-11-16 15:37:08', '2023-11-16 09:49:58'),
(31, 15, 'OnePlus 9 Pro', 6, 'oneplus-9-pro', 'OnePlus', 'agewgew', '<p>The OnePlus 9 Pro is a premium Android smartphone with a high-refresh-rate display and a powerful Snapdragon processor. It boasts a versatile camera system, fast charging capabilities, and a sleek design.</p>', 899, 799, 20, 0, 'published', '28/11/2023', 'găeg', 'aweg', '2023-11-16 15:37:08', '2023-11-28 02:12:49'),
(32, 15, 'Xiaomi Mi 11', NULL, 'xiaomi-mi-11', 'Xiaomi', '', 'The Xiaomi Mi 11 is a feature-packed Android smartphone with a high-resolution display and a powerful processor. It offers a versatile camera system, fast charging capabilities, and an affordable price.', 699, NULL, 40, 0, 'published', NULL, '', '', '2023-11-16 15:37:08', '2023-11-16 15:37:08'),
(35, 15, 'Samsung Galaxy S20', 6, 'samsung-galaxy-s20', 'Samsung', 'Powerful Android smartphone', '<p>The Samsung Galaxy S20 is a powerful Android smartphone with a stunning display and advanced camera features.</p>', 799, 699, 50, 0, 'published', '28/11/2023', 'Samsung Galaxy S20, Android smartphone', 'The Samsung Galaxy S20 is a powerful Android smartphone with a stunning display and advanced camera features.', '2023-11-16 15:41:53', '2023-11-28 02:00:00'),
(36, 15, 'Google Pixel 5', 6, 'google-pixel-5', 'Google', 'Pure Android experience', '<p>The Google Pixel 5 offers a pure Android experience with fast performance and regular software updates.</p>', 699, 599, 30, 0, 'published', '16/11/2023', 'Google Pixel 5, Android smartphone', 'The Google Pixel 5 offers a pure Android experience with fast performance and regular software updates.', '2023-11-16 15:41:53', '2023-11-16 09:45:35'),
(37, 15, 'OnePlus 8 Pro', 6, 'oneplus-8-pro', 'OnePlus', 'Flagship Android smartphone', '<p>The OnePlus 8 Pro is a flagship Android smartphone with a high-refresh-rate display and a powerful processor.</p>', 899, 799, 20, 0, 'published', '28/11/2023', 'OnePlus 8 Pro, Android smartphone', 'The OnePlus 8 Pro is a flagship Android smartphone with a high-refresh-rate display and a powerful processor.', '2023-11-16 15:41:53', '2023-11-28 02:12:09'),
(38, 15, 'Xiaomi Redmi Note 10', NULL, 'xiaomi-redmi-note-10', 'Xiaomi', 'Affordable Android smartphone', 'The Xiaomi Redmi Note 10 is an affordable Android smartphone with a large display and a long-lasting battery.', 299, NULL, 40, 0, 'published', '2023-11-16 22:41:53', 'Xiaomi Redmi Note 10, Android smartphone', 'The Xiaomi Redmi Note 10 is an affordable Android smartphone with a large display and a long-lasting battery.', '2023-11-16 15:41:53', '2023-11-16 15:41:53'),
(39, 14, 'iPhone 12 Pro', 6, 'iphone-12-pro', 'Apple', 'Flagship iPhone', '<p>The iPhone 12 Pro is a flagship iPhone with a powerful A14 Bionic chip and advanced camera system.</p>', 999, 899, 50, 0, 'published', '28/11/2023', 'iPhone 12 Pro, Apple smartphone', 'The iPhone 12 Pro is a flagship iPhone with a powerful A14 Bionic chip and advanced camera system.', '2023-11-16 15:44:32', '2023-11-28 02:17:08'),
(40, 14, 'iPhone 11', 6, 'iphone-11', 'Apple', 'Powerful iPhone', '<p>The iPhone 11 features a powerful A13 Bionic chip, a dual-camera system, and a liquid Retina display.</p>', 699, 599, 30, 0, 'published', '28/11/2023', 'iPhone 11, Apple smartphone', 'The iPhone 11 features a powerful A13 Bionic chip, a dual-camera system, and a liquid Retina display.', '2023-11-16 15:44:32', '2023-11-28 02:16:40'),
(41, 14, 'iPhone SE', 6, 'iphone-se', 'Apple', 'Compact iPhone', '<p>The iPhone SE is a compact iPhone with a powerful A14 Bionic chip and a single-camera system.</p>', 399, 299, 20, 0, 'published', '28/11/2023', 'iPhone SE, Apple smartphone', 'The iPhone SE is a compact iPhone with a powerful A14 Bionic chip and a single-camera system.', '2023-11-16 15:44:32', '2023-11-28 02:17:36'),
(42, 14, 'iPad Air', 6, 'ipad-air', 'Apple', 'Powerful iPad', '<p>The iPad Air features a powerful A14 Bionic chip, a large display, and support for Apple Pencil.</p>', 599, 499, 40, 0, 'published', '28/11/2023', 'iPad Air, Apple tablet', 'The iPad Air features a powerful A14 Bionic chip, a large display, and support for Apple Pencil.', '2023-11-16 15:44:32', '2023-11-28 02:16:13'),
(43, 5, 'Chuột không dây Logitech MX Master 3', 6, 'chuot-khong-day-logitech-mx-master-3', 'Logitech', 'Chuột không dây cao cấp', '<p>Chuột kh&ocirc;ng d&acirc;y Logitech MX Master 3 l&agrave; một chuột cao cấp với thiết kế tiện dụng v&agrave; t&iacute;nh năng đa nhiệm.</p>', 149, 139, 50, 0, 'published', '16/11/2023', 'Chuột không dây, Logitech MX Master 3', 'Chuột không dây Logitech MX Master 3 là một chuột cao cấp với thiết kế tiện dụng và tính năng đa nhiệm.', '2023-11-16 15:47:10', '2023-11-16 09:36:26'),
(44, 5, 'Chuột không dây Microsoft Surface Arc', 6, 'chuot-khong-day-microsoft-surface-arc', 'Microsoft', 'Chuột không dây mỏng nhẹ', '<p>Chuột kh&ocirc;ng d&acirc;y Microsoft Surface Arc c&oacute; thiết kế mỏng nhẹ v&agrave; linh hoạt, ph&ugrave; hợp với người d&ugrave;ng di chuyển.</p>', 79, 69, 30, 0, 'published', '16/11/2023', 'Chuột không dây, Microsoft Surface Arc', 'Chuột không dây Microsoft Surface Arc có thiết kế mỏng nhẹ và linh hoạt, phù hợp với người dùng di chuyển.', '2023-11-16 15:47:10', '2023-11-16 09:37:06'),
(45, 5, 'Chuột không dây HP X3000', 6, 'chuot-khong-day-hp-x3000', 'HP', 'Chuột không dây giá rẻ', '<p>Chuột kh&ocirc;ng d&acirc;y HP X3000 l&agrave; một lựa chọn phổ biến với gi&aacute; cả phải chăng v&agrave; t&iacute;nh năng đơn giản.</p>', 19, 17, 20, 0, 'published', '16/11/2023', 'Chuột không dây, HP X3000', 'Chuột không dây HP X3000 là một lựa chọn phổ biến với giá cả phải chăng và tính năng đơn giản.', '2023-11-16 15:47:10', '2023-11-16 09:35:38'),
(46, 5, 'Chuột không dây Dell WM126', 6, 'chuot-khong-day-dell-wm126', 'Dell', 'Chuột không dây tiện dụng', '<p>Chuột kh&ocirc;ng d&acirc;y Dell WM126 c&oacute; thiết kế tiện dụng v&agrave; hoạt động đ&aacute;ng tin cậy.</p>', 29, 19, 40, 0, 'published', '16/11/2023', 'Chuột không dây, Dell WM126', 'Chuột không dây Dell WM126 có thiết kế tiện dụng và hoạt động đáng tin cậy.', '2023-11-16 15:47:10', '2023-11-16 09:35:03'),
(47, 6, 'Baseus Adjustable Laptop Stand', 6, 'baseus-adjustable-laptop-stand', 'Baseus', 'Adjustable Laptop Stand', '<p>The Baseus Adjustable Laptop Stand is a versatile stand that provides ergonomic viewing angles for your laptop.</p>', 50, 49, 50, 0, 'published', '16/11/2023', 'Laptop Stand, Adjustable Stand, Baseus', 'The Baseus Adjustable Laptop Stand is a versatile stand that provides ergonomic viewing angles for your laptop.', '2023-11-16 15:50:07', '2023-11-16 09:30:29'),
(48, 6, 'Anker Vertical Laptop Stand', 6, 'anker-vertical-laptop-stand', 'Anker', 'Vertical Laptop Stand', '<p>The Anker Vertical Laptop Stand is a space-saving stand that holds your laptop in a vertical position.</p>', 30, 100, 30, 0, 'hidden', '24/11/2023', 'Laptop Stand, Vertical Stand, Anker', 'The Anker Vertical Laptop Stand is a space-saving stand that holds your laptop in a vertical position.', '2023-11-16 15:50:07', '2023-11-24 06:19:29'),
(49, 6, 'Rain Design mStand Laptop Stand', 6, 'rain-design-mstand-laptop-stand', 'Rain Design', 'Aluminum Laptop Stand', '<p>The Rain Design mStand Laptop Stand is a stylish stand made of aluminum that elevates your laptop for better airflow and ergonomics.</p>', 60, 50, 20, 0, 'published', '16/11/2023', 'Laptop Stand, Aluminum Stand, Rain Design', 'The Rain Design mStand Laptop Stand is a stylish stand made of aluminum that elevates your laptop for better airflow and ergonomics.', '2023-11-16 15:50:07', '2023-11-16 09:55:27'),
(50, 6, 'Twelve South BookArc Vertical Stand', 6, 'twelve-south-bookarc-vertical-stand', 'Twelve South', 'Vertical Stand for MacBook', '<p>The Twelve South BookArc Vertical Stand is specifically designed for MacBook and allows you to dock your MacBook in a vertical position.</p>', 40, 30, 40, 0, 'published', '16/11/2023', 'Vertical Stand, MacBook Stand, Twelve South', 'The Twelve South BookArc Vertical Stand is specifically designed for MacBook and allows you to dock your MacBook in a vertical position.', '2023-11-16 15:50:07', '2023-11-16 09:56:18'),
(51, 2, 'Dell XPS 13', 6, 'dell-xps-13', 'Dell', 'Powerful Ultrabook', '<p>The Dell XPS 13 is a powerful ultrabook with a sleek design and high-performance specifications.</p>', 1299, 1199, 50, 0, 'published', '16/11/2023', 'Ultrabook, Dell XPS 13', 'The Dell XPS 13 is a powerful ultrabook with a sleek design and high-performance specifications.', '2023-11-16 15:52:51', '2023-11-16 09:37:54'),
(52, 2, 'HP Spectre x360', 6, 'hp-spectre-x360', 'HP', 'Convertible Ultrabook', '<p>The HP Spectre x360 is a convertible ultrabook that combines the power of a laptop with the flexibility of a tablet.</p>', 1199, 1099, 30, 0, 'published', '16/11/2023', 'Ultrabook, Convertible, HP Spectre x360', 'The HP Spectre x360 is a convertible ultrabook that combines the power of a laptop with the flexibility of a tablet.', '2023-11-16 15:52:51', '2023-11-16 09:50:43'),
(53, 2, 'Lenovo ThinkPad X1 Carbon', 6, 'lenovo-thinkpad-x1-carbon', 'Lenovo', 'Business Ultrabook', '<p>The Lenovo ThinkPad X1 Carbon is a business ultrabook known for its durability and performance.</p>', 1499, 1399, 20, 0, 'published', '16/11/2023', 'Ultrabook, Business Laptop, Lenovo ThinkPad X1 Carbon', 'The Lenovo ThinkPad X1 Carbon is a business ultrabook known for its durability and performance.', '2023-11-16 15:52:51', '2023-11-16 09:53:04'),
(54, 2, 'Asus ZenBook 14', 6, 'asus-zenbook-14', 'Asus', 'Compact Ultrabook', '<p>The Asus ZenBook 14 is a compact ultrabook with a lightweight design and powerful specifications.</p>', 999, 899, 40, 0, 'published', '16/11/2023', 'Ultrabook, Compact Laptop, Asus ZenBook 14', 'The Asus ZenBook 14 is a compact ultrabook with a lightweight design and powerful specifications.', '2023-11-16 15:52:51', '2023-11-16 09:29:52'),
(55, 7, 'Canon EOS Rebel T7', 6, 'canon-eos-rebel-t7', 'Canon', 'Entry-level DSLR Camera', '<p>The Canon EOS Rebel T7 is an entry-level DSLR camera that offers high-quality image capture and easy-to-use features.</p>', 499, 489, 50, 0, 'published', '16/11/2023', 'Digital Camera, DSLR, Canon EOS Rebel T7', 'The Canon EOS Rebel T7 is an entry-level DSLR camera that offers high-quality image capture and easy-to-use features.', '2023-11-16 15:54:25', '2023-11-16 09:34:20'),
(56, 7, 'Nikon D5600', 6, 'nikon-d5600', 'Nikon', 'Mid-range DSLR Camera', '<p>The Nikon D5600 is a mid-range DSLR camera with advanced features and excellent image quality.</p>', 799, 699, 30, 0, 'published', '28/11/2023', 'Digital Camera, DSLR, Nikon D5600', 'The Nikon D5600 is a mid-range DSLR camera with advanced features and excellent image quality.', '2023-11-16 15:54:25', '2023-11-28 02:21:42'),
(57, 7, 'Sony Alpha a6000', 6, 'sony-alpha-a6000', 'Sony', 'Mirrorless Camera', '<p>The Sony Alpha a6000 is a compact mirrorless camera that delivers exceptional image quality and fast autofocus performance.</p>', 649, 600, 20, 0, 'published', '28/11/2023', 'Digital Camera, Mirrorless, Sony Alpha a6000', 'The Sony Alpha a6000 is a compact mirrorless camera that delivers exceptional image quality and fast autofocus performance.', '2023-11-16 15:54:25', '2023-11-28 02:09:38'),
(58, 7, 'Fujifilm X-T4', 6, 'fujifilm-x-t4', 'Fujifilm', 'Professional Mirrorless Camera', '<p>The Fujifilm X-T4 is a professional-grade mirrorless camera with advanced features and outstanding image stabilization.</p>', 1699, 1599, 40, 0, 'published', '16/11/2023', 'Digital Camera, Mirrorless, Fujifilm X-T4', 'The Fujifilm X-T4 is a professional-grade mirrorless camera with advanced features and outstanding image stabilization.', '2023-11-16 15:54:25', '2023-11-16 09:43:35'),
(59, 8, 'GoPro Hero9 Black', NULL, 'gopro-hero9-black', 'GoPro', '4K Action Camera', 'The GoPro Hero9 Black is a powerful 4K action camera that captures stunning footage and comes with advanced features for outdoor adventures.', 399, NULL, 50, 1, 'published', '2023-11-16 22:55:43', 'Action Camera, GoPro Hero9 Black', 'The GoPro Hero9 Black is a powerful 4K action camera that captures stunning footage and comes with advanced features for outdoor adventures.', '2023-11-16 15:55:43', '2023-11-16 15:55:43'),
(60, 8, 'DJI Osmo Action', 6, 'dji-osmo-action', 'DJI', '4K Action Camera', '<p>The DJI Osmo Action is a versatile 4K action camera that offers smooth, stable footage and is perfect for capturing your adventures.</p>', 299, 289, 30, 0, 'published', '16/11/2023', 'Action Camera, DJI Osmo Action', 'The DJI Osmo Action is a versatile 4K action camera that offers smooth, stable footage and is perfect for capturing your adventures.', '2023-11-16 15:55:43', '2023-11-16 09:39:41'),
(61, 8, 'Sony RX0 II', 6, 'sony-rx0-ii', 'Sony', 'Ultra-Compact Action Camera', '<p>The Sony RX0 II is an ultra-compact action camera that delivers high-quality images and is waterproof, shockproof, and crushproof.</p>', 699, 599, 20, 0, 'published', '28/11/2023', 'Action Camera, Sony RX0 II', 'The Sony RX0 II is an ultra-compact action camera that delivers high-quality images and is waterproof, shockproof, and crushproof.', '2023-11-16 15:55:43', '2023-11-28 01:58:24'),
(62, 8, 'Insta360 ONE R', NULL, 'insta360-one-r', 'Insta360', 'Modular Action Camera', 'The Insta360 ONE R is a modular action camera that allows you to switch between different lens modules to capture different perspectives.', 499, NULL, 40, 0, 'published', '2023-11-16 22:55:43', 'Action Camera, Insta360 ONE R', 'The Insta360 ONE R is a modular action camera that allows you to switch between different lens modules to capture different perspectives.', '2023-11-16 15:55:43', '2023-11-16 15:55:43'),
(63, 9, 'Polaroid OneStep 2', 6, 'polaroid-onestep-2', 'Polaroid', 'Analog Instant Camera', '<p>The Polaroid OneStep 2 is an analog instant camera that captures nostalgic, vintage-style photos with its classic design.</p>', 99, 89, 30, 0, 'published', '28/11/2023', 'Instant Camera, Polaroid OneStep 2', 'The Polaroid OneStep 2 is an analog instant camera that captures nostalgic, vintage-style photos with its classic design.', '2023-11-16 15:57:19', '2023-11-28 02:14:00'),
(64, 9, 'Leica Sofort', 6, 'leica-sofort', 'Leica', 'Premium Instant Camera', '<p>The Leica Sofort is a premium instant camera that combines classic design with modern features, producing high-quality instant prints.</p>', 299, 289, 20, 0, 'published', '28/11/2023', 'Instant Camera, Leica Sofort', 'The Leica Sofort is a premium instant camera that combines classic design with modern features, producing high-quality instant prints.', '2023-11-16 15:57:19', '2023-11-28 02:19:14'),
(65, 9, 'Kodak Printomatic', 6, 'kodak-printomatic', 'Kodak', 'Digital Instant Print Camera', '<p>The Kodak Printomatic is a digital instant print camera that captures and prints photos in an instant, giving you physical copies to share and enjoy.</p>', 79, 69, 40, 0, 'published', '28/11/2023', 'Instant Camera, Kodak Printomatic', 'The Kodak Printomatic is a digital instant print camera that captures and prints photos in an instant, giving you physical copies to share and enjoy.', '2023-11-16 15:57:19', '2023-11-28 02:18:48'),
(67, 9, 'Fujifilm Instax Mini 9', 6, 'fujifilm-instax-mini-9', 'Fujifilm', 'Instant Film Camera', '<p>The Fujifilm Instax Mini 9 is a fun and easy-to-use instant film camera that prints credit card-sized photos instantly.</p>', 69, 59, 50, 0, 'published', '16/11/2023', 'Instant Camera, Fujifilm Instax Mini 9', 'The Fujifilm Instax Mini 9 is a fun and easy-to-use instant film camera that prints credit card-sized photos instantly.', '2023-11-16 15:57:19', '2023-11-16 09:42:58'),
(68, 10, 'SanDisk Memory Card', 6, 'sandisk-memory-card', 'SanDisk', 'High-Speed Memory Card', '<p>The SanDisk Memory Card is a high-speed memory card that offers ample storage space and fast data transfer for capturing and storing your precious moments.</p>', 49, 39, 30, 0, 'published', '28/11/2023', 'Camera Accessories, SanDisk Memory Card', 'The SanDisk Memory Card is a high-speed memory card that offers ample storage space and fast data transfer for capturing and storing your precious moments.', '2023-11-16 15:58:15', '2023-11-28 02:09:02'),
(69, 10, 'Lowepro Camera Bag', 6, 'lowepro-camera-bag', 'Lowepro', 'Camera Backpack', '<p>The Lowepro Camera Bag is a durable and spacious camera backpack that provides excellent protection and organization for your camera gear during travel and outdoor adventures.</p>', 79, 69, 20, 0, 'published', '28/11/2023', 'Camera Accessories, Lowepro Camera Bag', 'The Lowepro Camera Bag is a durable and spacious camera backpack that provides excellent protection and organization for your camera gear during travel and outdoor adventures.', '2023-11-16 15:58:15', '2023-11-28 02:20:14'),
(70, 10, 'Rode VideoMic', 6, 'rode-videomic', 'Rode', 'Camera Microphone', '<p>The Rode VideoMic is a high-quality camera microphone that enhances the audio recording of your videos, capturing clear and professional sound.</p>', 129, 100, 40, 0, 'published', '28/11/2023', 'Camera Accessories, Rode VideoMic', 'The Rode VideoMic is a high-quality camera microphone that enhances the audio recording of your videos, capturing clear and professional sound.', '2023-11-16 15:58:15', '2023-11-28 02:14:32'),
(71, 10, 'Manfrotto Tripod', 6, 'manfrotto-tripod', 'Manfrotto', 'Professional Camera Tripod', '<p>The Manfrotto Tripod is a professional-grade camera tripod that provides stability and flexibility for capturing high-quality photos and videos.</p>', 149, 100, 50, 0, 'published', '28/11/2023', 'Camera Accessories, Manfrotto Tripod', 'The Manfrotto Tripod is a professional-grade camera tripod that provides stability and flexibility for capturing high-quality photos and videos.', '2023-11-16 15:58:15', '2023-11-28 02:20:42'),
(72, 11, 'JBL Flip 5', 6, 'jbl-flip-5', 'JBL', 'Portable Bluetooth Speaker', '<p>The JBL Flip 5 is a portable Bluetooth speaker that delivers powerful and immersive sound in a compact and rugged design, making it perfect for outdoor adventures and parties.</p>', 99, 89, 50, 0, 'published', '28/11/2023', 'Bluetooth Speakers, JBL Flip 5', 'The JBL Flip 5 is a portable Bluetooth speaker that delivers powerful and immersive sound in a compact and rugged design, making it perfect for outdoor adventures and parties.', '2023-11-16 15:59:29', '2023-11-28 02:18:05'),
(73, 11, 'Sony XB33', 6, 'sony-xb33', 'Sony', 'Waterproof Bluetooth Speaker', '<p>The Sony XB33 is a waterproof Bluetooth speaker that combines deep, punchy bass with clear and dynamic sound, making it ideal for pool parties and beach outings.</p>', 149, 130, 30, 0, 'published', '28/11/2023', 'Bluetooth Speakers, Sony XB33', 'The Sony XB33 is a waterproof Bluetooth speaker that combines deep, punchy bass with clear and dynamic sound, making it ideal for pool parties and beach outings.', '2023-11-16 15:59:29', '2023-11-28 01:59:02'),
(74, 11, 'UE Boom 3', NULL, 'ue-boom-3', 'UE', 'Portable Wireless Speaker', 'The UE Boom 3 is a portable wireless speaker that delivers 360-degree sound with deep bass and stunning clarity, creating an immersive listening experience anywhere you go.', 129, NULL, 20, 0, 'published', '2023-11-16 22:59:29', 'Bluetooth Speakers, UE Boom 3', 'The UE Boom 3 is a portable wireless speaker that delivers 360-degree sound with deep bass and stunning clarity, creating an immersive listening experience anywhere you go.', '2023-11-16 15:59:29', '2023-11-16 15:59:29'),
(75, 11, 'Bose SoundLink Revolve', 6, 'bose-soundlink-revolve', 'Bose', '360-Degree Bluetooth Speaker', '<p>The Bose SoundLink Revolve is a 360-degree Bluetooth speaker that offers true 360-degree sound for consistent, uniform coverage, ensuring a great listening experience from every angle.</p>', 199, 189, 40, 0, 'published', '16/11/2023', 'Bluetooth Speakers, Bose SoundLink Revolve', 'The Bose SoundLink Revolve is a 360-degree Bluetooth speaker that offers true 360-degree sound for consistent, uniform coverage, ensuring a great listening experience from every angle.', '2023-11-16 15:59:29', '2023-11-16 09:31:17'),
(77, 12, 'Logitech Z623', 6, 'logitech-z623', 'Logitech', '2.1 Speaker System', '<p>The Logitech Z623 is a powerful 2.1 speaker system that delivers rich and immersive sound for your desktop or computer setup, enhancing your audio experience while gaming, watching movies, or listening to music.</p>', 149, 139, 50, 0, 'published', '28/11/2023', 'Desktop Speakers, Logitech Z623', 'The Logitech Z623 is a powerful 2.1 speaker system that delivers rich and immersive sound for your desktop or computer setup, enhancing your audio experience while gaming, watching movies, or listening to music.', '2023-11-16 16:00:29', '2023-11-28 02:19:51'),
(78, 12, 'Edifier R1280T', 6, 'edifier-r1280t', 'Edifier', 'Active Bookshelf Speakers', '<p>The Edifier R1280T is a pair of active bookshelf speakers that produce clear and balanced audio with rich bass, making them ideal for desktop use or as a compact stereo system.</p>', 99, 89, 30, 0, 'published', '16/11/2023', 'Desktop Speakers, Edifier R1280T', 'The Edifier R1280T is a pair of active bookshelf speakers that produce clear and balanced audio with rich bass, making them ideal for desktop use or as a compact stereo system.', '2023-11-16 16:00:29', '2023-11-16 09:40:14'),
(79, 12, 'Harman Kardon SoundSticks III', NULL, 'harman-kardon-soundsticks-iii', 'Harman Kardon', '3-Piece Speaker System', 'The Harman Kardon SoundSticks III is a visually stunning 3-piece speaker system with a transparent design and exceptional sound quality, perfect for enhancing your desktop audio experience.', 199, NULL, 20, 0, 'published', '2023-11-16 23:00:29', 'Desktop Speakers, Harman Kardon SoundSticks III', 'The Harman Kardon SoundSticks III is a visually stunning 3-piece speaker system with a transparent design and exceptional sound quality, perfect for enhancing your desktop audio experience.', '2023-11-16 16:00:29', '2023-11-16 16:00:29'),
(80, 12, 'Bose Companion 2 Series III', 6, 'bose-companion-2-series-iii', 'Bose', 'Multimedia Speaker System', '<p>The Bose Companion 2 Series III is a multimedia speaker system that delivers clear and balanced audio for your computer or laptop, providing an immersive sound experience for your music, movies, and games.</p>', 99, 89, 40, 0, 'published', '16/11/2023', 'Desktop Speakers, Bose Companion 2 Series III', 'The Bose Companion 2 Series III is a multimedia speaker system that delivers clear and balanced audio for your computer or laptop, providing an immersive sound experience for your music, movies, and games.', '2023-11-16 16:00:29', '2023-11-16 09:32:10'),
(82, 16, 'Fitbit Versa 3', 6, 'fitbit-versa-3', 'Fitbit', 'Advanced Fitness Smartwatch', '<p>The Fitbit Versa 3 is an advanced fitness smartwatch that tracks your workouts, monitors your heart rate, and provides personalized insights to help you reach your fitness goals. With built-in GPS and a long battery life, its the perfect companion for your active lifestyle.</p>', 229, 219, 50, 0, 'published', '16/11/2023', 'Fitness Smartwatches, Fitbit Versa 3', 'The Fitbit Versa 3 is an advanced fitness smartwatch that tracks your workouts, monitors your heart rate, and provides personalized insights to help you reach your fitness goals. With built-in GPS and a long battery life, its the perfect companion for your active lifestyle.', '2023-11-16 16:01:52', '2023-11-16 09:41:12'),
(83, 16, 'Apple Watch Series 7', 6, 'apple-watch-series-7', 'Apple', 'High-End Fitness Smartwatch', '<p>The Apple Watch Series 7 is a high-end fitness smartwatch that features a larger display, advanced health tracking capabilities, and seamless integration with your iPhone. With its sleek design and powerful features, its the ultimate smartwatch for fitness enthusiasts.</p>', 399, 150, 30, 0, 'published', '16/11/2023', 'Fitness Smartwatches, Apple Watch Series 7', 'The Apple Watch Series 7 is a high-end fitness smartwatch that features a larger display, advanced health tracking capabilities, and seamless integration with your iPhone. With its sleek design and powerful features, its the ultimate smartwatch for fitness enthusiasts.', '2023-11-16 16:01:52', '2023-11-16 09:29:09'),
(84, 16, 'Samsung Galaxy Watch4', 6, 'samsung-galaxy-watch4', 'Samsung', 'Versatile Fitness Smartwatch', '<p>The Samsung Galaxy Watch4 is a versatile fitness smartwatch that combines stylish design with advanced health and fitness tracking features. With its comprehensive set of sensors and intuitive interface, it helps you stay motivated and achieve your fitness goals.</p>', 299, 289, 20, 0, 'published', '28/11/2023', 'Fitness Smartwatches, Samsung Galaxy Watch4', 'The Samsung Galaxy Watch4 is a versatile fitness smartwatch that combines stylish design with advanced health and fitness tracking features. With its comprehensive set of sensors and intuitive interface, it helps you stay motivated and achieve your fitness goals.', '2023-11-16 16:01:52', '2023-11-28 02:08:25'),
(85, 16, 'Garmin Forerunner 945', 6, 'garmin-forerunner-945', 'Garmin', 'Advanced GPS Smartwatch', '<p>The Garmin Forerunner 945 is an advanced GPS smartwatch designed for serious athletes. It offers comprehensive activity tracking, built-in maps, and advanced performance metrics to help you train smarter and achieve new personal records.</p>', 599, 499, 40, 0, 'published', '16/11/2023', 'Fitness Smartwatches, Garmin Forerunner 945', 'The Garmin Forerunner 945 is an advanced GPS smartwatch designed for serious athletes. It offers comprehensive activity tracking, built-in maps, and advanced performance metrics to help you train smarter and achieve new personal records.', '2023-11-16 16:01:52', '2023-11-16 09:44:49'),
(87, 17, 'Apple Watch SE', 6, 'apple-watch-se', 'Apple', 'Stylish Fashion Smartwatch', '<p>The Apple Watch SE is a stylish fashion smartwatch that combines advanced features with an affordable price. With its sleek design, customizable watch faces, and seamless integration with your iPhone, its the perfect accessory to complement your fashion-forward lifestyle.</p>', 279, 100, 50, 0, 'published', '16/11/2023', 'Fashion Smartwatches, Apple Watch SE', 'The Apple Watch SE is a stylish fashion smartwatch that combines advanced features with an affordable price. With its sleek design, customizable watch faces, and seamless integration with your iPhone, its the perfect accessory to complement your fashion-forward lifestyle.', '2023-11-16 16:02:46', '2023-11-16 09:28:30'),
(88, 17, 'Samsung Galaxy Watch Active 2', 6, 'samsung-galaxy-watch-active-2', 'Samsung', 'Sleek Fashion Smartwatch', '<p>The Samsung Galaxy Watch Active 2 is a sleek fashion smartwatch that offers a perfect blend of style and functionality. With its slim design, vibrant display, and comprehensive health tracking features, it s a versatile accessory for any fashion-conscious individual.</p>', 249, 200, 30, 0, 'published', '28/11/2023', 'Fashion Smartwatches, Samsung Galaxy Watch Active 2', 'The Samsung Galaxy Watch Active 2 is a sleek fashion smartwatch that offers a perfect blend of style and functionality. With its slim design, vibrant display, and comprehensive health tracking features, it s a versatile accessory for any fashion-conscious individual.', '2023-11-16 16:02:46', '2023-11-28 02:07:09'),
(89, 17, 'Fossil Gen 5', 6, 'fossil-gen-5', 'Fossil', 'Premium Fashion Smartwatch', '<p>The Fossil Gen 5 is a premium fashion smartwatch that combines classic design with modern technology. With its stainless steel case, customizable dials, and advanced features like heart rate monitoring and GPS, it s a stylish and functional accessory for the fashion-forward individual.</p>', 299, 289, 20, 0, 'published', '16/11/2023', 'Fashion Smartwatches, Fossil Gen 5', 'The Fossil Gen 5 is a premium fashion smartwatch that combines classic design with modern technology. With its stainless steel case, customizable dials, and advanced features like heart rate monitoring and GPS, it s a stylish and functional accessory for the fashion-forward individual.', '2023-11-16 16:02:46', '2023-11-16 09:42:29'),
(90, 17, 'Michael Kors Access Bradshaw 2', 6, 'michael-kors-access-bradshaw-2', 'Michael Kors', 'Luxury Fashion Smartwatch', '<p>The Michael Kors Access Bradshaw 2 is a luxury fashion smartwatch that exudes sophistication and style. With its stainless steel construction, elegant design, and a wide range of customizable features, it s the perfect accessory to elevate your fashion game.</p>', 399, 389, 40, 0, 'published', '28/11/2023', 'Fashion Smartwatches, Michael Kors Access Bradshaw 2', 'The Michael Kors Access Bradshaw 2 is a luxury fashion smartwatch that exudes sophistication and style. With its stainless steel construction, elegant design, and a wide range of customizable features, it s the perfect accessory to elevate your fashion game.', '2023-11-16 16:02:46', '2023-11-28 02:21:16'),
(92, 18, 'TAG Heuer Connected', 6, 'tag-heuer-connected', 'TAG Heuer', 'Elegant Luxury Smartwatch', '<p>The TAG Heuer Connected is an elegant luxury smartwatch that seamlessly combines traditional Swiss watchmaking with advanced technology. With its premium materials, customizable dials, and a wide range of smart features, it a statement piece for the discerning individual.</p>', 1999, 1899, 50, 0, 'published', '28/11/2023', 'Luxury Smartwatches, TAG Heuer Connected', 'The TAG Heuer Connected is an elegant luxury smartwatch that seamlessly combines traditional Swiss watchmaking with advanced technology. With its premium materials, customizable dials, and a wide range of smart features, its a statement piece for the discerning individual.', '2023-11-16 16:05:35', '2023-11-28 01:57:48'),
(93, 18, 'Omega Seamaster Aqua Terra', 6, 'omega-seamaster-aqua-terra', 'Omega', 'Sophisticated Luxury Smartwatch', '<p>The Omega Seamaster Aqua Terra is a sophisticated luxury smartwatch that embodies the spirit of the iconic Seamaster collection. With its refined design, precision movement, and smart features, its a timepiece that combines elegance and innovation.</p>', 3999, 2999, 30, 0, 'published', '28/11/2023', 'Luxury Smartwatches, Omega Seamaster Aqua Terra', 'The Omega Seamaster Aqua Terra is a sophisticated luxury smartwatch that embodies the spirit of the iconic Seamaster collection. With its refined design, precision movement, and smart features, its a timepiece that combines elegance and innovation.', '2023-11-16 16:05:35', '2023-11-28 02:11:15'),
(94, 18, 'Breitling Exospace B55', 6, 'breitling-exospace-b55', 'Breitling', 'Aviation-inspired Luxury Smartwatch', '<p>The Breitling Exospace B55 is an aviation-inspired luxury smartwatch that offers a perfect blend of style and functionality. With its robust construction, COSC-certified movement, and advanced connectivity features, its a timepiece for the modern aviator.</p>', 4999, 4889, 20, 0, 'published', '16/11/2023', 'Luxury Smartwatches, Breitling Exospace B55', 'The Breitling Exospace B55 is an aviation-inspired luxury smartwatch that offers a perfect blend of style and functionality. With its robust construction, COSC-certified movement, and advanced connectivity features, its a timepiece for the modern aviator.', '2023-11-16 16:05:35', '2023-11-16 09:33:11'),
(95, 18, 'Rolex Oyster Perpetual', 6, 'rolex-oyster-perpetual', 'Rolex', 'Iconic Luxury Smartwatch', '<p>The Rolex Oyster Perpetual is an iconic luxury smartwatch that represents the epitome of timeless elegance. With its legendary design, precise movement, and exceptional craftsmanship, its a symbol of status and sophistication.</p>', 7999, 5000, 40, 0, 'published', '28/11/2023', 'Luxury Smartwatches, Rolex Oyster Perpetual', 'The Rolex Oyster Perpetual is an iconic luxury smartwatch that represents the epitome of timeless elegance. With its legendary design, precise movement, and exceptional craftsmanship, its a symbol of status and sophistication.', '2023-11-16 16:05:35', '2023-11-28 02:15:35'),
(99, 2, 'Brandix Screwdriver SCREW150', 6, 'brandix-screwdriver-screw150', NULL, 'fewa', '<p>fawef</p>', 234, 1499, 0, 0, 'scheduled', '11/06/2023', 'fa', 'fawe', '2023-11-18 16:41:59', '2023-11-18 16:41:59'),
(100, 2, 'tesst', 6, 'test', NULL, 'FAWEG', '<p>FWAE</p>', 234, 234, 234, 0, 'scheduled', '11/13/2023', 'FAEW', 'ƯEAGF', '2023-11-20 04:13:43', '2023-11-20 04:13:43'),
(102, 2, 'Brandix Screwdriver SCREW150', 6, 'test2', NULL, 'gaweg', '<p>fawef</p>', 345, 345, 345, 0, 'scheduled', '11/21/2023', 'GAWE', 'GAWEG', '2023-11-21 03:56:17', '2023-11-21 03:56:17'),
(103, 2, 'ThinkPad X1 Carbon Gen 11', 6, 'TEST3', NULL, 'ĂEF', '<p>ĂEF</p>', 345, 345, 345, 0, 'scheduled', '11/21/2023', 'ĂEF', 'ĂEF', '2023-11-21 04:14:34', '2023-11-28 02:28:18'),
(105, 2, 't6', 6, 't6', NULL, 'agew', '<p>faweg</p>', 5325, 235, 232, 1, 'scheduled', '11/06/2023', 'ag', 'awge', '2023-11-21 05:07:16', '2023-11-21 05:07:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `quantity`, `color_id`, `created_at`, `updated_at`) VALUES
(3, 1, 2332, 2, '2023-09-28 15:21:44', '2023-09-28 15:21:44'),
(4, 1, 442, 4, '2023-09-28 15:21:44', '2023-09-28 15:21:44'),
(7, 5, 9, 1, '2023-10-01 14:24:40', '2023-10-01 18:36:42'),
(8, 5, 21, 2, '2023-10-01 14:24:40', '2023-10-01 14:24:40'),
(9, 6, 12, 1, '2023-10-01 14:26:44', '2023-10-01 14:26:44'),
(10, 6, 100, 4, '2023-10-01 14:26:44', '2023-10-01 14:26:44'),
(11, 7, 12, 1, '2023-10-01 14:30:18', '2023-10-01 14:30:18'),
(12, 7, 100, 4, '2023-10-01 14:30:18', '2023-10-01 14:30:18'),
(13, 8, 12, 1, '2023-10-01 14:32:57', '2023-10-01 14:32:57'),
(14, 8, 0, 4, '2023-10-01 14:32:57', '2023-10-01 18:41:34'),
(15, 9, 12, 1, '2023-10-01 14:41:01', '2023-10-01 14:41:01'),
(16, 9, 98, 4, '2023-10-01 14:41:01', '2023-10-01 15:43:06'),
(17, 10, 11, 1, '2023-10-01 14:59:16', '2023-11-03 01:04:26'),
(18, 10, 98, 4, '2023-10-01 14:59:16', '2023-10-01 18:35:38'),
(19, 11, 12, 1, '2023-10-01 15:00:20', '2023-10-01 15:00:20'),
(20, 11, 100, 4, '2023-10-01 15:00:20', '2023-10-01 15:00:20'),
(22, 12, 100, 1, '2023-11-16 08:21:55', '2023-11-16 08:21:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_comments`
--

CREATE TABLE `product_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_comments`
--

INSERT INTO `product_comments` (`id`, `product_id`, `user_id`, `rating`, `content`, `created_at`, `updated_at`) VALUES
(1, 10, 26, 4, 'Good product!', '2023-11-16 06:01:24', '2023-11-16 06:01:24'),
(2, 10, 26, 4, 'Good product!', '2023-11-16 06:04:47', '2023-11-16 06:04:47'),
(3, 10, 26, 3, 'aa', '2023-11-16 06:20:58', '2023-11-16 06:20:58'),
(4, 11, 26, 2, 'faewf', '2023-11-16 06:28:55', '2023-11-16 06:28:55'),
(5, 10, 26, 5, 'ffeaf', '2023-11-16 06:32:10', '2023-11-16 06:32:10'),
(6, 10, 26, 3, 'ăefaw', '2023-11-18 01:31:49', '2023-11-18 01:31:49'),
(7, 6, 1, 5, 'fawefawfe', '2023-11-18 01:33:39', '2023-11-18 01:33:39'),
(8, 6, 1, 3, 'aewfaewaf', '2023-11-18 01:35:56', '2023-11-18 01:35:56'),
(10, 5, 1, 5, 's', '2023-11-21 08:14:14', '2023-11-21 08:14:14'),
(11, 6, 1, 4, 'gg', '2023-11-25 03:11:34', '2023-11-25 03:11:34'),
(12, 10, 1, 3, 'aa', '2023-11-27 07:31:22', '2023-11-27 07:31:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(7, 10, 'images/7vvaYZPZYdU0teon6VoVzlfbnFm4ZDdTespEdK3Z.png', '2023-10-01 15:51:49', '2023-10-01 15:51:49'),
(8, 5, 'images/PONNN6GA7sykRq3dhZC8U1JEbPR5H0a1nL3PHHlo.png', '2023-10-01 14:24:40', '2023-10-01 14:24:40'),
(9, 6, 'images/8FsDXAildhz1K6ngdTvUsrWDstqBVvSMPqOJDjWJ.png', '2023-10-01 14:26:44', '2023-10-01 14:26:44'),
(10, 7, 'images/6qgkeqgJ829QP4RJPUIEFAHf460BONNkKtIGt5R5.png', '2023-10-01 14:30:18', '2023-10-01 14:30:18'),
(11, 8, 'images/DnnlNAQ04Tl8cd6zPLAlOc4KwY6xUMINRaU3Jitm.png', '2023-10-01 14:32:57', '2023-10-01 14:32:57'),
(12, 9, 'images/ZO2qqcyltklt2I2WO5NqQkAUvOgZ3HuX72PFZovf.png', '2023-10-01 14:41:01', '2023-10-01 14:41:01'),
(13, 10, 'images/Y41WvOnMK4MO98daphb0PiPEhcOa7B7eMV0MG5dK.png', '2023-10-01 14:59:16', '2023-10-01 14:59:16'),
(14, 11, 'images/pler2PtjxM3xm1vJokEOEyxAFPtYHl7Fl6BPYQuh.png', '2023-10-01 15:00:20', '2023-10-01 15:00:20'),
(15, 1, 'images/1ovpwpx4Q3tJC2tpIq2ZMUTAlaTJAfwjILZqY3z8.png', '2023-10-01 15:07:26', '2023-10-01 15:07:26'),
(19, 10, 'images/QGLLZEiRSGfUG92thuh9KrfjU719Zq5gxoSo4Mls.png', '2023-10-01 15:50:28', '2023-10-01 15:50:28'),
(20, 10, 'images/muKeNn3vpfBRE96R5kd022m9FusDqL7PiZ57uud9.png', '2023-10-01 15:50:28', '2023-10-01 15:50:28'),
(23, 10, 'images/tjUxuv91FoWc2k287ODFYDuLlMbwmsl52GPjK8Px.png', '2023-10-01 15:53:57', '2023-10-01 15:53:57'),
(27, 1, 'images/dR6CP9DhpzWQMvyjzGIrzEzElnoqDlNLJksSrGas.png', '2023-10-01 18:39:50', '2023-10-01 18:39:50'),
(34, 48, 'images/AMI4nwZ8rzrRVHVLD3THTwninU87uH97qMFEzoky.png', '2023-11-16 09:26:21', '2023-11-16 09:26:21'),
(35, 87, 'images/QAyvo5GuYh03KJKqoNM6qS3LKHu46mHVHI9mRd5V.png', '2023-11-16 09:28:30', '2023-11-16 09:28:30'),
(36, 83, 'images/O4xihhmmyLQypEycIfRED3JCT2XXeHZF11vMfFKk.png', '2023-11-16 09:29:09', '2023-11-16 09:29:09'),
(37, 54, 'images/Hd3u1qUo77yCwZ5Sy3iGH6t89RpweLJscad4uDsT.png', '2023-11-16 09:29:52', '2023-11-16 09:29:52'),
(38, 47, 'images/pHdmFS70eeSOADVI8Lo980bc1aCFgdnJC1OaDk4Y.png', '2023-11-16 09:30:29', '2023-11-16 09:30:29'),
(39, 75, 'images/weraXWny2fR65dBJ1j2LeLHSqjOabRKlGHwZhV09.png', '2023-11-16 09:31:17', '2023-11-16 09:31:17'),
(40, 80, 'images/hrJ67Tw4RFKcaWwhkRDB9sKXTSImYta9whvRMw7q.jpg', '2023-11-16 09:32:10', '2023-11-16 09:32:10'),
(41, 94, 'images/rZGgyESbCu3dSr7Zzy5y46aHNtn4uQrEMju2ORQA.jpg', '2023-11-16 09:33:11', '2023-11-16 09:33:11'),
(42, 55, 'images/M2vXhKxQAgR73ZJytmPCQqdqmx5SLj3MJkXPVs9u.png', '2023-11-16 09:34:20', '2023-11-16 09:34:20'),
(43, 46, 'images/TsOkQqirDbunxep1VtL5FLpWgY7XNQAlVZE6ZqNV.png', '2023-11-16 09:35:03', '2023-11-16 09:35:03'),
(44, 45, 'images/qgjI8Hg3OV0Wh9yliSuBFY11y1FwBlLZkfjWLVgD.png', '2023-11-16 09:35:38', '2023-11-16 09:35:38'),
(45, 43, 'images/WRXJbd81iIifrNqw2CddU1a33sjAtsbhVrGROW6e.png', '2023-11-16 09:36:26', '2023-11-16 09:36:26'),
(46, 44, 'images/NdHihMmn0FXK4M9VHwwkFOLvNfNfpEvbFMB20UXX.png', '2023-11-16 09:37:06', '2023-11-16 09:37:06'),
(47, 51, 'images/zom6aXOXGACUt6AN0fF8USg4QHcbvpw6yxMR76DV.png', '2023-11-16 09:37:54', '2023-11-16 09:37:54'),
(48, 21, 'images/6blRGKlcAvzh3XHdMlZWyFlkdmrQt9QPche37Kc1.png', '2023-11-16 09:38:37', '2023-11-16 09:38:37'),
(49, 60, 'images/wg6sWHCTq6lPA2vQVqDHU9k1iCLymHA0RaDg6lSD.png', '2023-11-16 09:39:41', '2023-11-16 09:39:41'),
(50, 78, 'images/BBhzC7fkW028RsqU7HMoftqwv9Rk2FHCZQ0d3wX1.png', '2023-11-16 09:40:14', '2023-11-16 09:40:14'),
(51, 82, 'images/3lyfC5KQfcyYTH6trviMvdK56q0Hs3kuOVdAqRTy.png', '2023-11-16 09:41:12', '2023-11-16 09:41:12'),
(52, 89, 'images/cn7VuKqO0BSI1QHeDPvX7KlzHeFbiM0mks5wnevb.png', '2023-11-16 09:42:29', '2023-11-16 09:42:29'),
(53, 67, 'images/cXqz0rYciFPtKxZw8XcVjqJbKkt424TXs2GivYF2.png', '2023-11-16 09:42:58', '2023-11-16 09:42:58'),
(54, 58, 'images/hXKmAZmZumz5yRQvgtjFXWlmwjLQ5VPhDSBJy5iT.png', '2023-11-16 09:43:35', '2023-11-16 09:43:35'),
(55, 85, 'images/CVyqWvk1D5tKBaDwv6EAHRITKolYJtevweuWAwZS.png', '2023-11-16 09:44:49', '2023-11-16 09:44:49'),
(56, 36, 'images/lyXoxXBmJs4Jk62V4vWPhIL7PqaMti9qOZ11W5yF.png', '2023-11-16 09:45:35', '2023-11-16 09:45:35'),
(57, 30, 'images/TXAltGToCmJHGKffloraPccVd6CBAYVhM0KpStCX.png', '2023-11-16 09:49:58', '2023-11-16 09:49:58'),
(58, 52, 'images/ajWeX9Et7nc2O4eMCoWqAzAL7zmoRLqjbvexEV5E.png', '2023-11-16 09:50:43', '2023-11-16 09:50:43'),
(59, 53, 'images/6jOTUbDsDxZ2mAhyW0GPa1CPc28cldDH2F6n1m9H.png', '2023-11-16 09:53:04', '2023-11-16 09:53:04'),
(60, 49, 'images/FC2gb3txMz3UmMyGZ055v595SMVLRQKvCcU5AapQ.png', '2023-11-16 09:55:27', '2023-11-16 09:55:27'),
(61, 50, 'images/SpT91xBWbovk4JRNBG87WHqUGosYK9ehIq0UmeZL.png', '2023-11-16 09:56:18', '2023-11-16 09:56:18'),
(62, 102, 'images/DSRV5ZBt7dOngA9iJnHn2BD5JELjyWuGaLs8nOV0.png', '2023-11-21 03:56:17', '2023-11-21 03:56:17'),
(63, 8, 'images/Km5qCHWnX7mL5kVjtLVCg0bzFQ7n4CrHVkY303fJ.png', '2023-11-21 08:24:47', '2023-11-21 08:24:47'),
(64, 8, 'images/PcaYNKRx3EhknR4ulvQHnxBjMFjyvHQDunlWRsDw.png', '2023-11-21 08:24:47', '2023-11-21 08:24:47'),
(67, 7, 'images/1SLuIFjq6sUFSXlbuPFcgKUZ9CqjIOkToWS5GmNS.png', '2023-11-21 08:31:34', '2023-11-21 08:31:34'),
(68, 7, 'images/bF5eCI0JmqFGyScP6dunuJSu7VXpA7E1ALVXTGUx.png', '2023-11-21 08:31:34', '2023-11-21 08:31:34'),
(69, 7, 'images/dNISTGd9HXI0PzgP8MEExfdZ3YMC93YwaCK1Bh06.png', '2023-11-21 08:31:34', '2023-11-21 08:31:34'),
(70, 5, 'images/OVLPZateupFonGwMXjUN7uxrsWtnntNlFu9HsjBG.jpg', '2023-11-21 08:33:41', '2023-11-21 08:33:41'),
(71, 5, 'images/xyoJUt9IJlY2egcxfKKDeONcGfpbqpplUVKEA32J.jpg', '2023-11-21 08:34:36', '2023-11-21 08:34:36'),
(72, 5, 'images/aWA5pTv10GftAFsCJqTGhlSmL1rC1tcoK0Ct5cjQ.jpg', '2023-11-21 08:34:36', '2023-11-21 08:34:36'),
(73, 12, 'images/dfCESqbbvYZvtLvnnJtWOMOOLLQA7sWzaiEcOGty.jpg', '2023-11-26 11:07:46', '2023-11-26 11:07:46'),
(75, 99, 'images/QNpXx2ZSb3PXtpaPGHsE1VAnEwpkh5KxhOTztgCL.jpg', '2023-11-26 11:14:09', '2023-11-26 11:14:09'),
(76, 59, 'images/CxTtvo7DUXVl3O7Y3aqMXq2gTKUxtAbzm9U6PWCm.jpg', '2023-11-26 11:17:44', '2023-11-26 11:17:44'),
(77, 79, 'images/9e49B0d2ONeY3XUT38Xb8jmdCOasEbiyvoKYRHjW.jpg', '2023-11-26 11:18:11', '2023-11-26 11:18:11'),
(78, 62, 'images/kooEL811V22myS1PVoXwL9FC1OMMtUKUdYL1Bl4o.jpg', '2023-11-26 11:18:34', '2023-11-26 11:18:34'),
(79, 38, 'images/Nk3QhrwncBwcu2ZTzaBymbrxCuBv6xgJvmtm8mLC.jpg', '2023-11-26 11:19:11', '2023-11-26 11:19:11'),
(80, 19, 'images/gKlI6AUcHuZFOplmLhvxyojFj5BLVQuPZ9MvhDbq.jpg', '2023-11-26 11:19:50', '2023-11-26 11:19:50'),
(81, 32, 'images/z0MWh7MLzSbRSIfjUqLBqzgq63RR8ZeYai8w8Ben.jpg', '2023-11-26 11:20:39', '2023-11-26 11:20:39'),
(82, 74, 'images/4t1kHcjMyiz3bq7JBkydzoRKH87le4f9YICbzJdB.jpg', '2023-11-26 11:21:40', '2023-11-26 11:21:40'),
(83, 100, 'images/19tOnyoee4j0dhgBjudJO6O4xlSVL4RHMwJpthHe.jpg', '2023-11-26 11:24:17', '2023-11-26 11:24:17'),
(84, 105, 'images/79dUFuYTQC3SOalcofrCQRq0omd9gjTP7HhNhWfC.jpg', '2023-11-26 11:25:36', '2023-11-26 11:25:36'),
(95, 13, 'images/POy0cSXpUEuKxMBNtPKSaS4NkRrbGa2RbB3g35Jr.png', '2023-11-28 01:54:28', '2023-11-28 01:54:28'),
(96, 14, 'images/hawluKRrx1n1ElaRXt8W5y7Xv7tWWcBne2S4jMPV.png', '2023-11-28 01:55:05', '2023-11-28 01:55:05'),
(98, 61, 'images/v9KFr4XA4ECEevdMkFIHzzCyKiXvAmRIcwVDW3Uq.jpg', '2023-11-28 01:58:24', '2023-11-28 01:58:24'),
(99, 73, 'images/qvWZrfbbo6Cl0vJVQFxhHaYTEicHttnCJQPVePbi.jpg', '2023-11-28 01:59:02', '2023-11-28 01:59:02'),
(100, 35, 'images/OKyhHz8PaTrLkbfQXKvBt9K2UrI6XZipNnWQbIVc.jpg', '2023-11-28 02:00:00', '2023-11-28 02:00:00'),
(101, 29, 'images/NsA6heRznKuRxTstIxCQvsmmlyDlUcxDR3adT4H1.jpg', '2023-11-28 02:06:26', '2023-11-28 02:06:26'),
(102, 88, 'images/FomxCKgpmpTCwAxvKPQASApwDl3TNxfSnXpMQppK.jpg', '2023-11-28 02:07:09', '2023-11-28 02:07:09'),
(103, 84, 'images/Hm6XRHWBYWrLg9RuU7YWrJm6ccxtLgchY4lFFUkA.jpg', '2023-11-28 02:08:25', '2023-11-28 02:08:25'),
(104, 68, 'images/EYMsHPbO4l1zazRCGAcubRbzS95hgnet6WfL6HZl.png', '2023-11-28 02:09:02', '2023-11-28 02:09:02'),
(105, 57, 'images/aqZrRtwnoYlm47jlkM516kazfW0AtGXZSi1KIBZ0.jpg', '2023-11-28 02:09:38', '2023-11-28 02:09:38'),
(107, 93, 'images/zqqx7OCQS1i3xx9lL31HMIfH5iuSDzNyq6dRunKf.png', '2023-11-28 02:11:15', '2023-11-28 02:11:15'),
(108, 37, 'images/1Tm4jHW97Dq3MKfB0QuZ0hYcPI2dyf73D0XZSVS7.png', '2023-11-28 02:12:09', '2023-11-28 02:12:09'),
(109, 31, 'images/PZICrU8hTJzq8wvzy5QjxolOs558cd0CP6xPuJ2I.png', '2023-11-28 02:12:49', '2023-11-28 02:12:49'),
(110, 16, 'images/UNwUzhpr8rq2kDoN4SgjA17oc8MX6QoKoD4vLk5O.jpg', '2023-11-28 02:13:25', '2023-11-28 02:13:25'),
(111, 63, 'images/mxDuf0eQiQnryi2Ne01Qc5BAvJ8xkw6ZHlFC5Zk0.png', '2023-11-28 02:14:00', '2023-11-28 02:14:00'),
(112, 70, 'images/IDc6LZswz1PPlbkhZgd8LRSjumeFiQDEO37ILJba.png', '2023-11-28 02:14:32', '2023-11-28 02:14:32'),
(113, 95, 'images/pwOfCxZGWpqgCjuiJKlWstTivIWai5HGVjchkVwm.png', '2023-11-28 02:15:35', '2023-11-28 02:15:35'),
(114, 42, 'images/lBKHMS78It4Hm7GGA1oK6xfrIb82kCOUsuUbGvN2.png', '2023-11-28 02:16:13', '2023-11-28 02:16:13'),
(115, 40, 'images/TOh1KI4ubH2QIel5nIkvj6TfH8ShFwcTgS2VgmpV.png', '2023-11-28 02:16:40', '2023-11-28 02:16:40'),
(116, 39, 'images/qkqGjKxHhtfDGCrLY9CGS0Mhqpfqa3eQEJjrheMZ.jpg', '2023-11-28 02:17:08', '2023-11-28 02:17:08'),
(117, 41, 'images/JCmlLWvQW331WZKwA9M0NlIVizzHOJbZ42c3aoIz.png', '2023-11-28 02:17:36', '2023-11-28 02:17:36'),
(118, 72, 'images/2CflpRuYgRA20Cfcm3u0tfgAKUsAEk1vxNdI1GGC.jpg', '2023-11-28 02:18:05', '2023-11-28 02:18:05'),
(119, 65, 'images/VyIldrkAfN55cApUZTURGpcrIABJOObRDqSd0ndP.jpg', '2023-11-28 02:18:48', '2023-11-28 02:18:48'),
(120, 64, 'images/5MgQQWMBLexOPkkUZTieCBQdjFBzm77qkaqEyC6H.jpg', '2023-11-28 02:19:14', '2023-11-28 02:19:14'),
(121, 77, 'images/DP8UBFC8yCZYaLFS1CfH4Tm56FGLWHeRjk1ePHTh.png', '2023-11-28 02:19:51', '2023-11-28 02:19:51'),
(122, 69, 'images/3A3BHUf1ECU6dhJN8e4oa33IiniJVJiaHMolHKcV.png', '2023-11-28 02:20:14', '2023-11-28 02:20:14'),
(123, 71, 'images/gmHMYvNY6Tkftticy8z2K4fpZbC7m4HP4zDP68Wd.png', '2023-11-28 02:20:42', '2023-11-28 02:20:42'),
(125, 56, 'images/y1ia7j9tD5gjtQvY1ZRhtU8DDkfBI9Rkk6CvpHw2.jpg', '2023-11-28 02:21:42', '2023-11-28 02:21:42'),
(126, 20, 'images/CNdFQQWdJBAGvgs2QWgkdbl8kmu8fcpQZCr5cqOB.jpg', '2023-11-28 02:23:09', '2023-11-28 02:23:09'),
(127, 92, 'images/3PVZAKEBsKFu2yNE4O4W80oVVVxr31QJb1TV408f.jpg', '2023-11-28 02:24:13', '2023-11-28 02:24:13'),
(128, 90, 'images/DZfUERAGu1PP6tILpkM6aJPxeOsYAFIMJreUQdcs.jpg', '2023-11-28 02:24:55', '2023-11-28 02:24:55'),
(129, 103, 'images/U1oUyBPv0zQJrpHh3S1eAXixcJddSX78y460Md6X.png', '2023-11-28 02:28:18', '2023-11-28 02:28:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `skus`
--

CREATE TABLE `skus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sku_code` varchar(255) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `original_price` int(11) NOT NULL,
  `promotion_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `skus`
--

INSERT INTO `skus` (`id`, `sku_code`, `product_id`, `original_price`, `promotion_price`, `quantity`, `created_at`, `updated_at`) VALUES
(5, 'FAWEF', 100, 23, 2, 6, '2023-11-20 04:12:44', '2023-11-23 20:18:31'),
(6, 'VZSW', 100, 234, 234, 229, '2023-11-20 04:12:44', '2023-11-20 22:18:18'),
(7, 'FAWEFFF', 101, 10, 346, 34, '2023-11-20 22:49:32', '2023-11-21 03:43:35'),
(10, 'FAFAWEF23A', 102, 345, 345, 45345, '2023-11-21 03:56:16', '2023-11-21 03:56:16'),
(22, 'GAEGAGE', 103, 345, 345, 35345, '2023-11-21 04:14:34', '2023-11-21 04:14:34'),
(24, 'waefaw', 105, 5325, 235, 23244, '2023-11-21 05:07:16', '2023-11-21 05:07:26'),
(25, 'AKEWFLF', 10, 1200, 1099, 67, '2023-11-21 07:00:33', '2023-11-28 02:39:26'),
(26, 'FWJEHGA', 10, 1300, 1199, 118, '2023-11-21 07:00:33', '2023-11-27 08:06:25'),
(27, 'GSDZG22', 10, 990, 900, 101, '2023-11-21 07:00:33', '2023-11-21 07:00:33'),
(28, 'FAWEG43', 10, 1329, 899, 88, '2023-11-21 07:00:33', '2023-11-28 02:40:55'),
(29, 'GEWRGW', 10, 1259, 978, 79, '2023-11-21 07:00:33', '2023-11-27 08:06:25'),
(30, 'GKALJWE', 10, 1100, 510, 160, '2023-11-21 07:00:33', '2023-11-21 07:00:33'),
(31, 'GAERGWY', 10, 1399, 800, 50, '2023-11-21 07:00:33', '2023-11-21 07:00:33'),
(32, 'GERARHA', 10, 1700, 690, 69, '2023-11-21 07:00:33', '2023-11-27 08:06:25'),
(33, 'FAFEFAEFJK', 8, 254, 3547, 499, '2023-11-21 07:46:39', '2023-11-22 00:15:03'),
(34, 'GAWEGAG4', 8, 4572, 7254, 644, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(35, 'GAWCTW4T', 8, 2346, 2346, 647, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(36, 'TAWVA44', 8, 264346, 2346, 456, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(37, 'AT4VAW4TVA', 8, 2364, 564, 457, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(38, 'ABTBAWETBA', 8, 345734, 457, 475, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(39, 'ABTGFDSG', 8, 3457, 3457, 457, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(40, 'BTATBA4', 8, 75437, 4354357, 457, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(41, 'TAB4BA5', 8, 3547, 34537, 457, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(42, 'BTRSEB5', 8, 73457, 453457, 454, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(43, 'BRETABW4A', 8, 74357, 3465, 345, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(44, 'TBAWB4TAB', 8, 345, 3456, 364, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(45, 'BAW4TBAH', 8, 3475, 4357, 346, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(46, 'A4TVAFD', 8, 3457, 3457, 676, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(47, 'YBEWY4BA', 8, 3457, 345, 685, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(48, 'BERYEY5', 8, 3457, 347, 346, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(49, 'B5YSERBG', 8, 3457, 3457, 346, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(50, 'FSYNSEY5NS', 8, 3457, 3457, 56567, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(51, 'SEN5YSBS', 8, 74357, 3457, 36, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(52, 'SERYSEN', 8, 36, 3456, 346, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(53, 'SEYNSDFGS', 8, 4568, 568, 657, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(54, 'VSERVGV', 8, 4568, 4568, 2324, '2023-11-21 07:46:39', '2023-11-23 20:24:01'),
(55, 'YSENSSF', 8, 4568, 4568, 7457, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(56, 'SYRSNRV', 8, 3457, 5468, 3463, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(57, 'HSERVDFSH', 8, 3457, 3475, 345, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(58, 'SDRHBSBGSEBR', 8, 3457, 3457, 34536, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(59, 'SRNSRYSV', 8, 3475, 3457, 64364, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(60, 'SERVSERY', 8, 3457, 357573, 346346, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(61, 'DHSNERYSB', 8, 3457, 3457, 346, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(62, 'SREYNSERYN', 8, 3457, 3457, 657, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(63, 'SERNYSF54W', 8, 3457, 3457, 56856, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(64, 'SRVGESV5', 8, 3457, 3457, 6346, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(65, 'SYBSERB5', 8, 3457, 3457, 346, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(66, 'SRSBERYB5', 8, 3456, 375473, 436, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(67, 'SYEBSFGDF', 8, 678, 578, 634, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(68, 'SDFGBHS', 8, 3457, 3457, 346, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(69, 'TNHDHTN', 8, 3457, 3457, 3765, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(70, 'SDFGSVDG', 8, 345, 347, 453, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(71, 'SRGVEYN', 8, 735, 3457, 456, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(72, 'HSENTYN', 8, 3547, 84, 765, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(73, 'SNFGSDF', 8, 73457, 345, 452, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(74, 'RYNSERY', 8, 345, 3457, 23534, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(75, 'NFSSEYS', 8, 3457, 343457, 6547, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(76, 'SHNSTYSNT', 8, 4357, 3457, 74575, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(77, 'SRSCGSER', 8, 3734, 3568, 4574, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(78, 'HSERYBSERT', 8, 356, 38653, 5435, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(79, 'SRGHVSEGF', 8, 3453, 567834, 56457, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(80, 'REVHSHSRH', 8, 5467, 8568, 56568, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(81, 'ERVYSEHSVFDG', 8, 7347, 3546, 3453, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(82, 'ERYSERBSER', 8, 45688, 4568, 457423, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(83, 'GBSERYSGSVR', 8, 4568, 4568, 36346, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(84, 'REBYSERYSV', 8, 4568, 4568, 34634, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(85, 'CSDFCSGSER', 8, 4568, 4568, 567, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(86, 'SEBRYSEB', 8, 456, 4568, 533546, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(87, 'ERYSEBRYFBGBX', 8, 5684568, 568456, 34, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(88, 'SBSRYBSRBYS', 8, 54684, 85468, 3463, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(89, 'SBRTSFGSBR', 8, 4567, 4567, 346, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(90, 'SBERTBSSBRS', 8, 567, 4567, 567, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(91, 'SBRETS5SEBF', 8, 5467, 5677, 25425, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(92, 'ERYSEBRGSEBR', 8, 345, 345, 235346, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(93, 'SERYBSRGSD', 8, 3454, 3455, 36346, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(94, 'SEBRYSEBRYSEBR', 8, 1414, 1244, 346346, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(95, 'BSERSRVSER', 8, 4124, 1241, 736, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(96, 'VGERYSERYB', 8, 1213, 1142, 34634, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(97, 'GEGGWEGA', 7, 1999, 1599, 500, '2023-11-21 07:58:22', '2023-11-21 07:58:22'),
(98, 'ERTACFJK4', 7, 1899, 1499, 200, '2023-11-21 07:58:22', '2023-11-21 07:58:22'),
(99, 'CWT3VTV', 7, 1799, 1399, 180, '2023-11-21 07:58:22', '2023-11-21 07:58:22'),
(100, 'REYBSEY6E', 7, 1699, 1299, 520, '2023-11-21 07:58:22', '2023-11-21 07:58:22'),
(101, 'FGAASC34', 6, 1999, 1899, 100, '2023-11-21 08:05:51', '2023-11-21 08:05:51'),
(102, 'EWABYAYN', 6, 2777, 2699, 233, '2023-11-21 08:05:51', '2023-11-21 08:05:51'),
(103, 'W4YVW44', 6, 1690, 1599, 525, '2023-11-21 08:05:51', '2023-11-21 08:05:51'),
(104, 'ERSGV666', 6, 990, 899, 235, '2023-11-21 08:05:51', '2023-11-21 08:05:51'),
(105, 'VJKHSDRC4', 5, 1999, 1899, 199, '2023-11-21 08:09:24', '2023-11-21 08:09:24'),
(106, 'AEFAVWT4AV4', 5, 1799, 1599, 345, '2023-11-21 08:09:24', '2023-11-21 08:09:24'),
(107, 'WEVTASFAV4A', 5, 1899, 1799, 645, '2023-11-21 08:09:24', '2023-11-21 08:09:24'),
(108, 'CEAETBAAWETV', 5, 1699, 1599, 234, '2023-11-21 08:09:24', '2023-11-21 08:09:24'),
(109, 'AWTATBA55QV4', 5, 1599, 1499, 2543, '2023-11-21 08:09:24', '2023-11-21 08:09:24'),
(110, 'ATAVWET34Q', 5, 1499, 1399, 457, '2023-11-21 08:09:24', '2023-11-21 08:09:24'),
(111, 'CKALWEJAG', 1, 89, 69, 1242, '2023-11-21 08:16:01', '2023-11-21 08:16:01'),
(112, 'FAWEV4A444', 1, 79, 59, 5435, '2023-11-21 08:16:01', '2023-11-21 08:16:01'),
(113, 'AVASDFV4AVA', 1, 80, 70, 6346, '2023-11-21 08:16:01', '2023-11-21 08:16:01'),
(114, 'KFLJLAKEFA4', 9, 599, 465, 345, '2023-11-21 08:21:46', '2023-11-21 08:21:46'),
(115, 'AEVA4AVAWV', 9, 499, 477, 626, '2023-11-21 08:21:46', '2023-11-21 08:21:46'),
(116, 'AWTBAW4BTAW4V', 9, 577, 476, 235, '2023-11-21 08:21:46', '2023-11-21 08:21:46'),
(117, 'AW4TAB4AB4T', 9, 589, 455, 6243, '2023-11-21 08:21:46', '2023-11-21 08:21:46'),
(118, 'ABTAVAVTAEY5', 9, 580, 400, 345, '2023-11-21 08:21:46', '2023-11-21 08:21:46'),
(119, 'ABTVACAWEAFH', 9, 560, 300, 6454, '2023-11-21 08:21:46', '2023-11-21 08:21:46'),
(120, 'FAEWG3CJK344TA', 11, 1999, 1567, 454, '2023-11-27 21:04:50', '2023-11-28 02:39:26'),
(121, 'AW4BTW4AVW4B', 11, 1899, 1756, 363, '2023-11-27 21:04:50', '2023-11-27 21:04:50'),
(122, 'AW4TBAWVACTA', 11, 1799, 1684, 234, '2023-11-27 21:04:50', '2023-11-27 21:04:50'),
(123, 'BA46ARBTARTBAET', 11, 1699, 1585, 622, '2023-11-27 21:04:50', '2023-11-27 21:04:50'),
(124, 'AGWGACC4', 12, 199, 189, 456, '2023-11-27 21:09:42', '2023-11-27 21:09:42'),
(125, 'AWTBAW4TA4', 12, 299, 289, 354, '2023-11-27 21:09:42', '2023-11-27 21:09:42'),
(126, 'GAWECATWA35', 52, 1999, 1899, 435, '2023-11-27 21:11:15', '2023-11-27 21:11:15'),
(127, 'FAWETA4BAW6N', 52, 1899, 1799, 636, '2023-11-27 21:11:15', '2023-11-27 21:11:15'),
(128, 'GAWYAW4FV65W', 53, 1889, 1799, 456, '2023-11-27 21:12:18', '2023-11-27 21:12:18'),
(129, 'W5N6W5WBB', 53, 1789, 1699, 474, '2023-11-27 21:12:18', '2023-11-27 21:12:18'),
(130, 'FA436AVAW46B', 51, 1988, 1899, 453, '2023-11-27 21:13:31', '2023-11-27 21:13:31'),
(131, 'AW4AWV4VA46', 51, 1798, 1699, 636, '2023-11-27 21:13:31', '2023-11-27 21:13:31'),
(132, 'GAWEAW45W', 54, 1799, 1699, 5425, '2023-11-27 21:14:43', '2023-11-27 21:14:43'),
(133, 'GAWTV34VTW', 99, 189, 179, 544, '2023-11-27 21:16:00', '2023-11-27 21:16:00'),
(134, '4664N4E6SNE', 99, 179, 169, 564, '2023-11-27 21:16:00', '2023-11-27 21:16:00'),
(135, 'GWEAWGAG45WT', 43, 188, 167, 234, '2023-11-27 21:19:31', '2023-11-27 21:19:31'),
(136, 'EYWYVW35VW3', 43, 178, 157, 2352, '2023-11-27 21:19:31', '2023-11-27 21:19:31'),
(137, 'YW35BYW3', 43, 168, 159, 624, '2023-11-27 21:19:31', '2023-11-27 21:19:31'),
(138, 'WB5YW54NW4N', 43, 158, 149, 462, '2023-11-27 21:19:31', '2023-11-27 21:19:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sku_variants`
--

CREATE TABLE `sku_variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sku` varchar(255) NOT NULL,
  `variant_value_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sku_variants`
--

INSERT INTO `sku_variants` (`id`, `sku`, `variant_value_id`, `created_at`, `updated_at`) VALUES
(13, 'FAWEF', 246, '2023-11-20 04:12:44', '2023-11-20 04:12:44'),
(14, 'FAWEF', 250, '2023-11-20 04:12:44', '2023-11-20 04:12:44'),
(15, 'VZSW', 247, '2023-11-20 04:12:44', '2023-11-20 04:12:44'),
(16, 'VZSW', 250, '2023-11-20 04:12:44', '2023-11-20 04:12:44'),
(17, 'FAWEFFF', 251, '2023-11-20 22:49:32', '2023-11-20 22:49:32'),
(20, 'FAFAWEF23A', 254, '2023-11-21 03:56:16', '2023-11-21 03:56:16'),
(21, 'FAFAWEF23A', 256, '2023-11-21 03:56:16', '2023-11-21 03:56:16'),
(22, 'FAFAWEF23A', 258, '2023-11-21 03:56:16', '2023-11-21 03:56:16'),
(52, 'GAEGAGE', 264, '2023-11-21 04:14:34', '2023-11-21 04:14:34'),
(53, 'GAEGAGE', 266, '2023-11-21 04:14:34', '2023-11-21 04:14:34'),
(56, 'waefaw', 280, '2023-11-21 05:07:16', '2023-11-21 05:07:16'),
(57, 'AKEWFLF', 281, '2023-11-21 07:00:33', '2023-11-21 07:00:33'),
(58, 'AKEWFLF', 285, '2023-11-21 07:00:33', '2023-11-21 07:00:33'),
(59, 'FWJEHGA', 281, '2023-11-21 07:00:33', '2023-11-21 07:00:33'),
(60, 'FWJEHGA', 286, '2023-11-21 07:00:33', '2023-11-21 07:00:33'),
(61, 'GSDZG22', 282, '2023-11-21 07:00:33', '2023-11-21 07:00:33'),
(62, 'GSDZG22', 285, '2023-11-21 07:00:33', '2023-11-21 07:00:33'),
(63, 'FAWEG43', 282, '2023-11-21 07:00:33', '2023-11-21 07:00:33'),
(64, 'FAWEG43', 286, '2023-11-21 07:00:33', '2023-11-21 07:00:33'),
(65, 'GEWRGW', 283, '2023-11-21 07:00:33', '2023-11-21 07:00:33'),
(66, 'GEWRGW', 285, '2023-11-21 07:00:33', '2023-11-21 07:00:33'),
(67, 'GKALJWE', 283, '2023-11-21 07:00:33', '2023-11-21 07:00:33'),
(68, 'GKALJWE', 286, '2023-11-21 07:00:33', '2023-11-21 07:00:33'),
(69, 'GAERGWY', 284, '2023-11-21 07:00:33', '2023-11-21 07:00:33'),
(70, 'GAERGWY', 285, '2023-11-21 07:00:33', '2023-11-21 07:00:33'),
(71, 'GERARHA', 284, '2023-11-21 07:00:33', '2023-11-21 07:00:33'),
(72, 'GERARHA', 286, '2023-11-21 07:00:33', '2023-11-21 07:00:33'),
(73, 'FAFEFAEFJK', 287, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(74, 'FAFEFAEFJK', 290, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(75, 'FAFEFAEFJK', 294, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(76, 'GAWEGAG4', 287, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(77, 'GAWEGAG4', 290, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(78, 'GAWEGAG4', 295, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(79, 'GAWCTW4T', 287, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(80, 'GAWCTW4T', 290, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(81, 'GAWCTW4T', 296, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(82, 'TAWVA44', 287, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(83, 'TAWVA44', 290, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(84, 'TAWVA44', 297, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(85, 'AT4VAW4TVA', 287, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(86, 'AT4VAW4TVA', 291, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(87, 'AT4VAW4TVA', 294, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(88, 'ABTBAWETBA', 287, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(89, 'ABTBAWETBA', 291, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(90, 'ABTBAWETBA', 295, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(91, 'ABTGFDSG', 287, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(92, 'ABTGFDSG', 291, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(93, 'ABTGFDSG', 296, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(94, 'BTATBA4', 287, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(95, 'BTATBA4', 291, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(96, 'BTATBA4', 297, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(97, 'TAB4BA5', 287, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(98, 'TAB4BA5', 292, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(99, 'TAB4BA5', 294, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(100, 'BTRSEB5', 287, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(101, 'BTRSEB5', 292, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(102, 'BTRSEB5', 295, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(103, 'BRETABW4A', 287, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(104, 'BRETABW4A', 292, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(105, 'BRETABW4A', 296, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(106, 'TBAWB4TAB', 287, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(107, 'TBAWB4TAB', 292, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(108, 'TBAWB4TAB', 297, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(109, 'BAW4TBAH', 287, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(110, 'BAW4TBAH', 293, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(111, 'BAW4TBAH', 294, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(112, 'A4TVAFD', 287, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(113, 'A4TVAFD', 293, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(114, 'A4TVAFD', 295, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(115, 'YBEWY4BA', 287, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(116, 'YBEWY4BA', 293, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(117, 'YBEWY4BA', 296, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(118, 'BERYEY5', 287, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(119, 'BERYEY5', 293, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(120, 'BERYEY5', 297, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(121, 'B5YSERBG', 288, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(122, 'B5YSERBG', 290, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(123, 'B5YSERBG', 294, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(124, 'FSYNSEY5NS', 288, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(125, 'FSYNSEY5NS', 290, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(126, 'FSYNSEY5NS', 295, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(127, 'SEN5YSBS', 288, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(128, 'SEN5YSBS', 290, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(129, 'SEN5YSBS', 296, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(130, 'SERYSEN', 288, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(131, 'SERYSEN', 290, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(132, 'SERYSEN', 297, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(133, 'SEYNSDFGS', 288, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(134, 'SEYNSDFGS', 291, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(135, 'SEYNSDFGS', 294, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(136, 'VSERVGV', 288, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(137, 'VSERVGV', 291, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(138, 'VSERVGV', 295, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(139, 'YSENSSF', 288, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(140, 'YSENSSF', 291, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(141, 'YSENSSF', 296, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(142, 'SYRSNRV', 288, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(143, 'SYRSNRV', 291, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(144, 'SYRSNRV', 297, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(145, 'HSERVDFSH', 288, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(146, 'HSERVDFSH', 292, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(147, 'HSERVDFSH', 294, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(148, 'SDRHBSBGSEBR', 288, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(149, 'SDRHBSBGSEBR', 292, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(150, 'SDRHBSBGSEBR', 295, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(151, 'SRNSRYSV', 288, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(152, 'SRNSRYSV', 292, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(153, 'SRNSRYSV', 296, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(154, 'SERVSERY', 288, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(155, 'SERVSERY', 292, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(156, 'SERVSERY', 297, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(157, 'DHSNERYSB', 288, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(158, 'DHSNERYSB', 293, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(159, 'DHSNERYSB', 294, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(160, 'SREYNSERYN', 288, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(161, 'SREYNSERYN', 293, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(162, 'SREYNSERYN', 295, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(163, 'SERNYSF54W', 288, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(164, 'SERNYSF54W', 293, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(165, 'SERNYSF54W', 296, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(166, 'SRVGESV5', 288, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(167, 'SRVGESV5', 293, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(168, 'SRVGESV5', 297, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(169, 'SYBSERB5', 289, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(170, 'SYBSERB5', 290, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(171, 'SYBSERB5', 294, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(172, 'SRSBERYB5', 289, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(173, 'SRSBERYB5', 290, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(174, 'SRSBERYB5', 295, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(175, 'SYEBSFGDF', 289, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(176, 'SYEBSFGDF', 290, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(177, 'SYEBSFGDF', 296, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(178, 'SDFGBHS', 289, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(179, 'SDFGBHS', 290, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(180, 'SDFGBHS', 297, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(181, 'TNHDHTN', 289, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(182, 'TNHDHTN', 291, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(183, 'TNHDHTN', 294, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(184, 'SDFGSVDG', 289, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(185, 'SDFGSVDG', 291, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(186, 'SDFGSVDG', 295, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(187, 'SRGVEYN', 289, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(188, 'SRGVEYN', 291, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(189, 'SRGVEYN', 296, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(190, 'HSENTYN', 289, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(191, 'HSENTYN', 291, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(192, 'HSENTYN', 297, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(193, 'SNFGSDF', 289, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(194, 'SNFGSDF', 292, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(195, 'SNFGSDF', 294, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(196, 'RYNSERY', 289, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(197, 'RYNSERY', 292, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(198, 'RYNSERY', 295, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(199, 'NFSSEYS', 289, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(200, 'NFSSEYS', 292, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(201, 'NFSSEYS', 296, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(202, 'SHNSTYSNT', 289, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(203, 'SHNSTYSNT', 292, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(204, 'SHNSTYSNT', 297, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(205, 'SRSCGSER', 289, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(206, 'SRSCGSER', 293, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(207, 'SRSCGSER', 294, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(208, 'HSERYBSERT', 289, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(209, 'HSERYBSERT', 293, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(210, 'HSERYBSERT', 295, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(211, 'SRGHVSEGF', 289, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(212, 'SRGHVSEGF', 293, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(213, 'SRGHVSEGF', 296, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(214, 'REVHSHSRH', 289, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(215, 'REVHSHSRH', 293, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(216, 'REVHSHSRH', 297, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(217, 'ERVYSEHSVFDG', 298, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(218, 'ERVYSEHSVFDG', 290, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(219, 'ERVYSEHSVFDG', 294, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(220, 'ERYSERBSER', 298, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(221, 'ERYSERBSER', 290, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(222, 'ERYSERBSER', 295, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(223, 'GBSERYSGSVR', 298, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(224, 'GBSERYSGSVR', 290, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(225, 'GBSERYSGSVR', 296, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(226, 'REBYSERYSV', 298, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(227, 'REBYSERYSV', 290, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(228, 'REBYSERYSV', 297, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(229, 'CSDFCSGSER', 298, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(230, 'CSDFCSGSER', 291, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(231, 'CSDFCSGSER', 294, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(232, 'SEBRYSEB', 298, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(233, 'SEBRYSEB', 291, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(234, 'SEBRYSEB', 295, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(235, 'ERYSEBRYFBGBX', 298, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(236, 'ERYSEBRYFBGBX', 291, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(237, 'ERYSEBRYFBGBX', 296, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(238, 'SBSRYBSRBYS', 298, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(239, 'SBSRYBSRBYS', 291, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(240, 'SBSRYBSRBYS', 297, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(241, 'SBRTSFGSBR', 298, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(242, 'SBRTSFGSBR', 292, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(243, 'SBRTSFGSBR', 294, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(244, 'SBERTBSSBRS', 298, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(245, 'SBERTBSSBRS', 292, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(246, 'SBERTBSSBRS', 295, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(247, 'SBRETS5SEBF', 298, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(248, 'SBRETS5SEBF', 292, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(249, 'SBRETS5SEBF', 296, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(250, 'ERYSEBRGSEBR', 298, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(251, 'ERYSEBRGSEBR', 292, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(252, 'ERYSEBRGSEBR', 297, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(253, 'SERYBSRGSD', 298, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(254, 'SERYBSRGSD', 293, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(255, 'SERYBSRGSD', 294, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(256, 'SEBRYSEBRYSEBR', 298, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(257, 'SEBRYSEBRYSEBR', 293, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(258, 'SEBRYSEBRYSEBR', 295, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(259, 'BSERSRVSER', 298, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(260, 'BSERSRVSER', 293, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(261, 'BSERSRVSER', 296, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(262, 'VGERYSERYB', 298, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(263, 'VGERYSERYB', 293, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(264, 'VGERYSERYB', 297, '2023-11-21 07:46:39', '2023-11-21 07:46:39'),
(265, 'GEGGWEGA', 299, '2023-11-21 07:58:22', '2023-11-21 07:58:22'),
(266, 'GEGGWEGA', 303, '2023-11-21 07:58:22', '2023-11-21 07:58:22'),
(267, 'GEGGWEGA', 301, '2023-11-21 07:58:22', '2023-11-21 07:58:22'),
(268, 'ERTACFJK4', 299, '2023-11-21 07:58:22', '2023-11-21 07:58:22'),
(269, 'ERTACFJK4', 303, '2023-11-21 07:58:22', '2023-11-21 07:58:22'),
(270, 'ERTACFJK4', 302, '2023-11-21 07:58:22', '2023-11-21 07:58:22'),
(271, 'CWT3VTV', 300, '2023-11-21 07:58:22', '2023-11-21 07:58:22'),
(272, 'CWT3VTV', 303, '2023-11-21 07:58:22', '2023-11-21 07:58:22'),
(273, 'CWT3VTV', 301, '2023-11-21 07:58:22', '2023-11-21 07:58:22'),
(274, 'REYBSEY6E', 300, '2023-11-21 07:58:22', '2023-11-21 07:58:22'),
(275, 'REYBSEY6E', 303, '2023-11-21 07:58:22', '2023-11-21 07:58:22'),
(276, 'REYBSEY6E', 302, '2023-11-21 07:58:22', '2023-11-21 07:58:22'),
(277, 'FGAASC34', 306, '2023-11-21 08:05:51', '2023-11-21 08:05:51'),
(278, 'FGAASC34', 304, '2023-11-21 08:05:51', '2023-11-21 08:05:51'),
(279, 'EWABYAYN', 306, '2023-11-21 08:05:51', '2023-11-21 08:05:51'),
(280, 'EWABYAYN', 305, '2023-11-21 08:05:51', '2023-11-21 08:05:51'),
(281, 'W4YVW44', 307, '2023-11-21 08:05:51', '2023-11-21 08:05:51'),
(282, 'W4YVW44', 304, '2023-11-21 08:05:51', '2023-11-21 08:05:51'),
(283, 'ERSGV666', 307, '2023-11-21 08:05:51', '2023-11-21 08:05:51'),
(284, 'ERSGV666', 305, '2023-11-21 08:05:51', '2023-11-21 08:05:51'),
(285, 'VJKHSDRC4', 308, '2023-11-21 08:09:24', '2023-11-21 08:09:24'),
(286, 'VJKHSDRC4', 310, '2023-11-21 08:09:24', '2023-11-21 08:09:24'),
(287, 'AEFAVWT4AV4', 308, '2023-11-21 08:09:24', '2023-11-21 08:09:24'),
(288, 'AEFAVWT4AV4', 311, '2023-11-21 08:09:24', '2023-11-21 08:09:24'),
(289, 'WEVTASFAV4A', 308, '2023-11-21 08:09:24', '2023-11-21 08:09:24'),
(290, 'WEVTASFAV4A', 312, '2023-11-21 08:09:24', '2023-11-21 08:09:24'),
(291, 'CEAETBAAWETV', 309, '2023-11-21 08:09:24', '2023-11-21 08:09:24'),
(292, 'CEAETBAAWETV', 310, '2023-11-21 08:09:24', '2023-11-21 08:09:24'),
(293, 'AWTATBA55QV4', 309, '2023-11-21 08:09:24', '2023-11-21 08:09:24'),
(294, 'AWTATBA55QV4', 311, '2023-11-21 08:09:24', '2023-11-21 08:09:24'),
(295, 'ATAVWET34Q', 309, '2023-11-21 08:09:24', '2023-11-21 08:09:24'),
(296, 'ATAVWET34Q', 312, '2023-11-21 08:09:24', '2023-11-21 08:09:24'),
(297, 'CKALWEJAG', 317, '2023-11-21 08:16:01', '2023-11-21 08:16:01'),
(298, 'CKALWEJAG', 314, '2023-11-21 08:16:01', '2023-11-21 08:16:01'),
(299, 'FAWEV4A444', 317, '2023-11-21 08:16:01', '2023-11-21 08:16:01'),
(300, 'FAWEV4A444', 315, '2023-11-21 08:16:01', '2023-11-21 08:16:01'),
(301, 'AVASDFV4AVA', 317, '2023-11-21 08:16:01', '2023-11-21 08:16:01'),
(302, 'AVASDFV4AVA', 316, '2023-11-21 08:16:01', '2023-11-21 08:16:01'),
(303, 'KFLJLAKEFA4', 318, '2023-11-21 08:21:46', '2023-11-21 08:21:46'),
(304, 'KFLJLAKEFA4', 321, '2023-11-21 08:21:46', '2023-11-21 08:21:46'),
(305, 'AEVA4AVAWV', 318, '2023-11-21 08:21:46', '2023-11-21 08:21:46'),
(306, 'AEVA4AVAWV', 322, '2023-11-21 08:21:46', '2023-11-21 08:21:46'),
(307, 'AWTBAW4BTAW4V', 319, '2023-11-21 08:21:46', '2023-11-21 08:21:46'),
(308, 'AWTBAW4BTAW4V', 321, '2023-11-21 08:21:46', '2023-11-21 08:21:46'),
(309, 'AW4TAB4AB4T', 319, '2023-11-21 08:21:46', '2023-11-21 08:21:46'),
(310, 'AW4TAB4AB4T', 322, '2023-11-21 08:21:46', '2023-11-21 08:21:46'),
(311, 'ABTAVAVTAEY5', 320, '2023-11-21 08:21:46', '2023-11-21 08:21:46'),
(312, 'ABTAVAVTAEY5', 321, '2023-11-21 08:21:46', '2023-11-21 08:21:46'),
(313, 'ABTVACAWEAFH', 320, '2023-11-21 08:21:46', '2023-11-21 08:21:46'),
(314, 'ABTVACAWEAFH', 322, '2023-11-21 08:21:46', '2023-11-21 08:21:46'),
(315, 'FAEWG3CJK344TA', 323, '2023-11-27 21:04:50', '2023-11-27 21:04:50'),
(316, 'FAEWG3CJK344TA', 325, '2023-11-27 21:04:50', '2023-11-27 21:04:50'),
(317, 'AW4BTW4AVW4B', 323, '2023-11-27 21:04:50', '2023-11-27 21:04:50'),
(318, 'AW4BTW4AVW4B', 326, '2023-11-27 21:04:50', '2023-11-27 21:04:50'),
(319, 'AW4TBAWVACTA', 324, '2023-11-27 21:04:50', '2023-11-27 21:04:50'),
(320, 'AW4TBAWVACTA', 325, '2023-11-27 21:04:50', '2023-11-27 21:04:50'),
(321, 'BA46ARBTARTBAET', 324, '2023-11-27 21:04:50', '2023-11-27 21:04:50'),
(322, 'BA46ARBTARTBAET', 326, '2023-11-27 21:04:50', '2023-11-27 21:04:50'),
(323, 'AGWGACC4', 327, '2023-11-27 21:09:42', '2023-11-27 21:09:42'),
(324, 'AGWGACC4', 329, '2023-11-27 21:09:42', '2023-11-27 21:09:42'),
(325, 'AWTBAW4TA4', 328, '2023-11-27 21:09:42', '2023-11-27 21:09:42'),
(326, 'AWTBAW4TA4', 329, '2023-11-27 21:09:42', '2023-11-27 21:09:42'),
(327, 'GAWECATWA35', 330, '2023-11-27 21:11:15', '2023-11-27 21:11:15'),
(328, 'FAWETA4BAW6N', 331, '2023-11-27 21:11:15', '2023-11-27 21:11:15'),
(329, 'GAWYAW4FV65W', 332, '2023-11-27 21:12:18', '2023-11-27 21:12:18'),
(330, 'W5N6W5WBB', 333, '2023-11-27 21:12:18', '2023-11-27 21:12:18'),
(331, 'FA436AVAW46B', 334, '2023-11-27 21:13:31', '2023-11-27 21:13:31'),
(332, 'AW4AWV4VA46', 335, '2023-11-27 21:13:31', '2023-11-27 21:13:31'),
(333, 'GAWEAW45W', 338, '2023-11-27 21:14:43', '2023-11-27 21:14:43'),
(334, 'GAWEAW45W', 336, '2023-11-27 21:14:43', '2023-11-27 21:14:43'),
(335, 'GAWEAW45W', 337, '2023-11-27 21:14:43', '2023-11-27 21:14:43'),
(336, 'GAWTV34VTW', 340, '2023-11-27 21:16:00', '2023-11-27 21:16:00'),
(337, 'GAWTV34VTW', 339, '2023-11-27 21:16:00', '2023-11-27 21:16:00'),
(338, '4664N4E6SNE', 341, '2023-11-27 21:16:00', '2023-11-27 21:16:00'),
(339, '4664N4E6SNE', 339, '2023-11-27 21:16:00', '2023-11-27 21:16:00'),
(340, 'GWEAWGAG45WT', 342, '2023-11-27 21:19:31', '2023-11-27 21:19:31'),
(341, 'GWEAWGAG45WT', 344, '2023-11-27 21:19:31', '2023-11-27 21:19:31'),
(342, 'EYWYVW35VW3', 342, '2023-11-27 21:19:31', '2023-11-27 21:19:31'),
(343, 'EYWYVW35VW3', 345, '2023-11-27 21:19:31', '2023-11-27 21:19:31'),
(344, 'YW35BYW3', 343, '2023-11-27 21:19:31', '2023-11-27 21:19:31'),
(345, 'YW35BYW3', 344, '2023-11-27 21:19:31', '2023-11-27 21:19:31'),
(346, 'WB5YW54NW4N', 343, '2023-11-27 21:19:31', '2023-11-27 21:19:31'),
(347, 'WB5YW54NW4N', 345, '2023-11-27 21:19:31', '2023-11-27 21:19:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Gaming Monitors 65', '<h1><strong>BLACK FRIDAY</strong><br />\r\nMARTPHONES</h1>\r\n\r\n<p>D&Ugrave;NG M&Atilde; &#39;<strong><em><big>FF0000</big></em></strong>&#39;&nbsp; ĐỂ GIẢM 12% ĐƠN H&Agrave;NG!</p>', 'images/FDtRtsSoY8j2bWAx5jx2zLPrpc36hKmDaTKmolJi.png', 1, '2023-09-25 04:18:08', '2023-11-25 02:28:03'),
(2, 'Smartphones Sale', '<h1><strong>END SEASONS</strong><br />\r\nMARTPHONES</h1>\r\n\r\n<p>LAST CALL FOR UP TO $250OFF!</p>', 'images/NfGlYbs8rOk7TECxTPeCTwH7tDWgQWIxQAXsUvZP.png', 1, '2023-09-30 07:27:48', '2023-10-01 22:59:07'),
(3, 'End Season Sale', '<h1><strong>END SEASONS</strong><br />\r\nMARTPHONES</h1>\r\n\r\n<p>LAST CALL FOR UP TO $250OFF!</p>', NULL, 1, '2023-09-30 07:40:33', '2023-09-30 07:40:33'),
(4, 'Laptops Arrivals', '<h1><strong>END SEASONS</strong><br />\r\nMARTPHONES</h1>\r\n\r\n<p>LAST CALL FOR UP TO $250OFF!</p>', 'images/gg6DgBvUp9Jy0UZze1hBi2eJWsXfgkg5L8Zj1BZa.webp', 1, '2023-09-30 07:41:40', '2023-09-30 07:41:40'),
(5, 'Earphones - 25%', '<h1><strong>END SEASONS</strong><br />\r\nMARTPHONES</h1>\r\n\r\n<p>LAST CALL FOR UP TO $250OFF!</p>', 'images/NrR3RjRW4S9EzA65qLa6l9z9y2S97NlKmiyLEYDp.png', 1, '2023-09-30 07:47:24', '2023-10-01 23:04:08'),
(6, 'Tablets 10 inch Sale', '<h1><strong>END SEASONS</strong><br />\r\nMARTPHONES</h1>\r\n\r\n<p>LAST CALL FOR UP TO $250OFF!</p>', 'images/H0OPNNofiLfO6aLgvxIjl8ZTw0wjpJ39Szz2ZK2v.png', 1, '2023-09-30 07:49:22', '2023-09-30 07:49:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `slug`, `category_id`, `status`, `created_at`, `updated_at`, `image`) VALUES
(2, 'Ultrabooks', 'accessories', 1, 1, '2023-09-22 12:31:16', '2023-10-01 20:50:04', 'images/XNf0rI3D7MJT8O6Bo6Xo1oi6hVrtmCKxllL0bcLt.png'),
(3, 'Laptop Accessories', 'laptop-accessories', 1, 1, '2023-09-24 20:10:45', '2023-10-01 20:53:54', 'images/ryVSykpsD8wc0hjgEOS9MjcWYK3l0d2SeK9X3Sxs.png'),
(4, 'Gaming Laptops', 'gaming-laptop', 1, 1, '2023-10-01 20:36:05', '2023-10-01 20:43:15', 'images/uIbM7Rzj0g1DHbEa5Kzl0hCSxsbIu9Ijn41Ec5jl.png'),
(5, 'Laptop Mice', 'laptop-mice', 1, 1, '2023-10-01 20:56:53', '2023-10-01 20:56:53', 'images/sfE5FMXAtePkxW4kDgw5GX77bQ1HlKffZJtgwGSR.png'),
(6, 'Stands and Docking Stations', 'stands-and-docking-stations', 1, 1, '2023-10-01 20:57:54', '2023-10-01 20:58:19', 'images/jkAxQPMYQ3iAkdXtvozuJUqTEvnTo9L2sy1YHfHJ.png'),
(7, 'Digital Cameras', 'digital-camera', 4, 1, '2023-10-01 21:00:30', '2023-10-01 21:00:30', 'images/5jqlPZOw12JlhyHfzMjtzJxsMQxnRAhPPCzpj38o.png'),
(8, 'Action Camera', 'action-cameras', 4, 1, '2023-10-01 21:01:19', '2023-11-02 19:23:29', 'images/BgmZhMOPILEbuhldFPZ7bUewFgqPHOMDJvaDywB9.png'),
(9, 'Instant Cameras', 'instant-cameras', 4, 1, '2023-10-01 21:02:07', '2023-10-01 21:02:07', 'images/6oonNDRSRvpqJ9c7FG0MR7wB2wXmODaYYrSq7H2e.png'),
(10, 'Camera Accessories', 'camera-accessories', 4, 1, '2023-10-01 21:03:11', '2023-10-01 21:03:11', 'images/7v1w6WXSJgFDzfGeOUH9VCHYEtXMQfndCqBW2D0p.png'),
(11, 'Bluetooth Speakers', 'bluetooth-speakers', 10, 1, '2023-10-01 21:05:10', '2023-10-01 21:05:10', 'images/azNnOGdQwWeqcJZZuszXSlUNFKwPFGZ9WIRxH4hx.png'),
(12, 'Desktop Speakers', 'desktop-speakers', 10, 1, '2023-10-01 21:06:02', '2023-10-01 21:06:02', 'images/MdQa0IhTcGUoXwVOusWpdiB37gpOGAEJHuXA6AZq.png'),
(13, 'Android Phones', 'android-phones', 6, 1, '2023-10-01 21:09:09', '2023-10-01 21:09:09', 'images/NITxf1qCCM2KvyRfprTQdNBvjGqSkIDWvgHV1uB1.png'),
(14, 'iPhone', 'iphone', 6, 1, '2023-10-01 21:09:37', '2023-10-01 21:09:37', 'images/A1uNb0oSPjzIsP0h1ZRPyK0IO9uv9TzpYnN1jmKA.png'),
(15, 'Budget Phones', 'budget-phone', 6, 1, '2023-10-01 21:10:44', '2023-10-01 21:12:45', 'images/xRkfHjjF88HEn1cs6BI3cms5B1uXQkhT14EWvl1T.png'),
(16, 'Fitness Smartwatches', 'fitness-smartwatches', 12, 1, '2023-10-01 21:14:26', '2023-10-01 21:14:26', 'images/8AapsvOoFc1OM79MmXvA4BB8yju4dP7v5IUlmHuc.png'),
(17, 'Fashion Smartwatches', 'fashion-smartwatches', 12, 1, '2023-10-01 21:15:04', '2023-10-01 21:15:04', 'images/sU0FfJ4yNxZ5GiWLen92Bpnnk0uwzenEQoroMKQa.png'),
(18, 'Luxury Smartwatches', 'luxury-smartwatches', 12, 1, '2023-10-01 21:16:03', '2023-10-01 21:16:03', 'images/WcOAhMCwcc0lWU6d1rvsI7aXLbat2A59RJdV9hkZ.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `wallet_id` int(11) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'cancel',
  `method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `transaction`
--

INSERT INTO `transaction` (`id`, `wallet_id`, `amount`, `type`, `created_at`, `updated_at`, `status`, `method`) VALUES
(10, 1, 100.00, 'deposit', '2023-11-02 00:40:25', '2023-11-02 00:40:25', 'cancel', 'vn_pay'),
(11, 1, 111.00, 'deposit', '2023-11-02 00:40:46', '2023-11-02 00:41:00', 'complete', 'vn_pay'),
(12, 1, 111.00, 'deposit', '2023-11-02 01:36:05', '2023-11-02 01:37:27', 'complete', 'vn_pay'),
(13, 1, -39.39, 'withdraw', '2023-11-02 01:37:58', '2023-11-02 01:37:58', 'complete', 'shopping'),
(14, 1, -39.39, 'withdraw', '2023-11-02 01:39:23', '2023-11-02 01:39:23', 'complete', 'shopping'),
(15, 1, 333.00, 'deposit', '2023-11-02 01:47:34', '2023-11-02 01:47:34', 'cancel', 'vn_pay'),
(16, 2, 22.00, 'deposit', '2023-11-02 03:53:51', '2023-11-02 03:53:51', 'cancel', 'vn_pay'),
(17, 3, 111.00, 'deposit', '2023-11-02 18:58:01', '2023-11-02 18:58:42', 'complete', 'vn_pay'),
(19, 33, 23423.00, 'deposit', '2023-11-24 05:33:15', '2023-11-24 05:33:15', 'cancel', 'vn_pay'),
(20, 33, 3531.97, 'Hoàn tiền', '2023-11-26 17:35:10', '2023-11-26 17:35:10', 'complete', 'shopping'),
(21, 33, 1109.99, 'Hoàn tiền', '2023-11-26 17:37:02', '2023-11-26 17:37:02', 'complete', 'shopping'),
(22, 33, 1953.58, 'Hoàn tiền', '2023-11-27 07:41:10', '2023-11-27 07:41:10', 'complete', 'shopping'),
(23, 33, -3347.22, 'withdraw', '2023-11-27 08:06:25', '2023-11-27 08:06:25', 'complete', 'shopping'),
(24, 33, -799.03, 'withdraw', '2023-11-28 02:40:42', '2023-11-28 02:40:42', 'complete', 'shopping'),
(25, 33, 799.03, 'Hoàn tiền', '2023-11-28 02:40:55', '2023-11-28 02:40:55', 'complete', 'shopping');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 as user, 1 as admin',
  `otp` int(11) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `companyname` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `facebook_id` varchar(255) DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_as`, `otp`, `lastname`, `firstname`, `companyname`, `country`, `address`, `zipcode`, `phone`, `facebook_id`, `google_id`) VALUES
(1, 'sagewg', 'trangiangzxc@gmail.com', '2023-11-13 10:03:47', '$2y$10$cTNRwOh0VEMdB7eDJ5UJjOKKvDWRIEgPRC3UiAI8RwoZwc8h71o8u', NULL, '2023-09-21 23:40:03', '2023-11-21 22:00:38', 1, 451959, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Violon', 'fawefa@gaegwg', NULL, '$2y$10$u2Znp2zZv158IA6KkqPAeOlArCX3w5iMf3DHEVyhodU9ptsmmApzS', NULL, '2023-11-02 03:53:34', '2023-11-02 03:53:34', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Violon', '1@1', '2023-11-16 11:02:26', '$2y$10$QNG.ESAu5apfxVnH.bs3EeZC49SBIEWDGeVJPJfnp8y/HxCdoZo6q', NULL, '2023-11-02 07:05:47', '2023-11-13 00:14:04', 1, 738193, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Violon', 'trangiangzxcz@gmail.com', '2023-11-13 10:03:21', '$2y$10$71rmRnxc/ysIWVcmD5Fl.u6vlw8fFduDnOqKRX3ClDcUDVmH.EtQq', NULL, '2023-11-12 19:19:02', '2023-11-12 19:19:02', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'awegaw', '2508roaablox@gmail.com', NULL, '$2y$10$8aBwfNZE1eCkJdR2ywma4OyEnlh.3NGfrdzL1GvpXuARKY6zRvbT6', NULL, '2023-11-12 19:39:25', '2023-11-12 19:39:25', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'awegaw', '250aaa8roaablox@gmail.com', NULL, '$2y$10$83erwsYnjzfUR9D4KIb4nOV5dI2uccUACbJJb.JHbM7dE1UnZEeuK', NULL, '2023-11-12 19:41:20', '2023-11-12 19:41:20', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'rweawg', 'admaerain1@gaegwg', NULL, '$2y$10$vkzzqEFMgtXHOir2dbLu9.HDVOdW309c2sKATrVqoNintUHPW1RBK', NULL, '2023-11-12 19:42:52', '2023-11-12 19:42:52', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'gaewg', 'tranaagangzxc@gmail.com', NULL, '$2y$10$tvm/qMK6PlTUcPBB2BGXEul6ruCSlvbk3WDZf65T6G.qzTgohmHHq', NULL, '2023-11-12 19:44:29', '2023-11-12 19:44:29', 0, 731217, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Giang Tran', 'giangtlhps26818@fpt.edu.vn', '2023-11-09 08:26:09', '$2y$10$e7gNOWviCwsTYJRAKtd4i.UrA41SGrb5Uw6QsdEH1rSq/qP8L0s7u', NULL, '2023-11-13 00:29:53', '2023-11-18 07:41:32', 0, 717375, 'ăegaw', 'faweg', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'fafwe', 'ruw20367@zbock.com', NULL, '$2y$10$Rv64nQOrDAAaLF3KDz7FkONeWkffKUSNjKJrCM7un3sudR.D71ua6', NULL, '2023-11-13 01:04:45', '2023-11-13 01:04:45', 0, 628142, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'fafwe', 'aqo91086@omeie.com', '2023-11-13 01:07:49', '$2y$10$z6G/a2nz6Ld3VHjv0bd.peJa17lNwUH1VUtHNw1La2e8fkkficNyS', NULL, '2023-11-13 01:05:40', '2023-11-13 01:07:49', 0, 459861, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Giang Trần', 'sks40695@omeie.com', '2023-11-13 01:11:39', '$2y$10$gGX4eqtsdpah/vRQH1WVEebLyi59LibJ6nbjpp606D6wYA1NBOkja', NULL, '2023-11-13 01:08:19', '2023-11-13 01:11:39', 0, 958119, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'Violon', 'newaccount11@gmail.com', NULL, '$2y$10$cgZ9ZdVpxaNAKs5KvHQjAOBVBaW.6MuZkB3edEsSw3QT5oMm/PEN2', NULL, '2023-11-17 00:57:13', '2023-11-17 00:57:13', 0, 732745, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'Giang Tran', 'trancoizxcv@gmail.com', NULL, '$2y$10$XBBgwj.1IAwW3FUEcotUVesd8mTxPdsoLAkr.2qMXAW/5k3h1UqYa', NULL, '2023-11-18 04:10:43', '2023-11-24 04:28:12', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1236620617232531', NULL),
(44, 'Giang Trần', '2506roblox@gmail.com', NULL, '$2y$10$xc7sLf/4fOlEW1VJHNN5tuC5DzwhXjlzLnNemogovjeC3LN5nVqda', NULL, '2023-11-18 04:48:06', '2023-11-21 21:58:37', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '102191180406501260504'),
(46, 'Brandix Screwdriver SCREW150', 'trangiangzffffxc@gmail.com', NULL, '$2y$10$ouXoBqdnFDoExNYXs/JTueWq2V9.xeibI8mshXRPohZ3ggvrw1dym', NULL, '2023-11-24 04:28:32', '2023-11-24 04:28:32', 0, 479560, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `variants`
--

CREATE TABLE `variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `variants`
--

INSERT INTO `variants` (`id`, `value`, `created_at`, `updated_at`) VALUES
(1, 'Màu sắc', '2023-11-18 14:37:19', '2023-11-18 14:42:37'),
(2, 'Size', '2023-11-18 14:42:47', '2023-11-18 14:42:47'),
(3, 'Loại', '2023-11-18 14:43:00', '2023-11-18 14:47:34'),
(6, 'Color', '2023-11-21 06:55:28', '2023-11-21 06:55:28'),
(7, 'Style', '2023-11-21 06:56:26', '2023-11-21 06:56:26'),
(8, 'Memory Storage', '2023-11-21 07:34:44', '2023-11-21 07:34:44'),
(9, 'CPU Model', '2023-11-21 07:35:00', '2023-11-21 07:35:00'),
(10, 'Graphics Card', '2023-11-21 07:38:17', '2023-11-21 07:38:17'),
(11, 'Ram Memory Installed Size', '2023-11-21 07:57:08', '2023-11-21 07:57:08'),
(12, 'Connector Type', '2023-11-21 08:10:07', '2023-11-21 08:10:07'),
(13, 'Compatible Phone Models', '2023-11-21 08:10:25', '2023-11-21 08:10:25'),
(14, 'Processor', '2023-11-27 21:05:56', '2023-11-27 21:05:56'),
(15, 'Water Resistance:', '2023-11-27 21:06:03', '2023-11-27 21:06:03'),
(16, 'Compatibility', '2023-11-27 21:17:26', '2023-11-27 21:17:26'),
(17, 'Sensor', '2023-11-27 21:17:34', '2023-11-27 21:17:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `variant_values`
--

CREATE TABLE `variant_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `variant_id` bigint(20) UNSIGNED NOT NULL,
  `sku_id` varchar(255) DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `variant_values`
--

INSERT INTO `variant_values` (`id`, `variant_id`, `sku_id`, `product_id`, `created_at`, `updated_at`, `value`) VALUES
(246, 1, NULL, 100, '2023-11-20 04:10:20', '2023-11-20 04:10:20', 'xanh'),
(247, 1, NULL, 100, '2023-11-20 04:10:24', '2023-11-20 04:10:24', 'đỏ'),
(250, 2, NULL, 100, '2023-11-20 04:12:22', '2023-11-20 04:12:22', '2'),
(251, 1, NULL, 101, '2023-11-20 22:39:38', '2023-11-20 22:39:38', 'dăd'),
(252, 1, NULL, 101, '2023-11-20 22:39:46', '2023-11-20 22:39:46', 'gưaeg'),
(253, 1, NULL, 101, '2023-11-20 22:48:55', '2023-11-20 22:48:55', 'xanh'),
(254, 1, NULL, 102, '2023-11-21 03:54:51', '2023-11-21 03:54:51', 'xanh'),
(255, 1, NULL, 102, '2023-11-21 03:54:55', '2023-11-21 03:54:55', 'đỏ'),
(256, 2, NULL, 102, '2023-11-21 03:54:59', '2023-11-21 03:54:59', 'nhỏ'),
(257, 2, NULL, 102, '2023-11-21 03:55:02', '2023-11-21 03:55:02', 'lớn'),
(258, 3, NULL, 102, '2023-11-21 03:55:09', '2023-11-21 03:55:09', '1'),
(259, 3, NULL, 102, '2023-11-21 03:55:11', '2023-11-21 03:55:11', '2'),
(264, 1, NULL, 103, '2023-11-21 04:10:19', '2023-11-21 04:10:19', 'XANH'),
(265, 1, NULL, 103, '2023-11-21 04:10:21', '2023-11-21 04:10:21', 'DO'),
(266, 2, NULL, 103, '2023-11-21 04:10:24', '2023-11-21 04:10:24', '1'),
(267, 2, NULL, 103, '2023-11-21 04:10:25', '2023-11-21 04:10:25', '2'),
(268, 1, NULL, 103, '2023-11-21 04:14:08', '2023-11-21 04:14:08', 'aa'),
(269, 1, NULL, 104, '2023-11-21 04:22:44', '2023-11-21 04:22:44', 'aeg'),
(270, 1, NULL, 104, '2023-11-21 04:23:09', '2023-11-21 04:23:09', 'ffff'),
(271, 1, NULL, 104, '2023-11-21 04:28:38', '2023-11-21 04:28:38', NULL),
(272, 1, NULL, 104, '2023-11-21 04:28:41', '2023-11-21 04:28:41', 'fawef'),
(273, 1, NULL, 104, '2023-11-21 04:28:43', '2023-11-21 04:28:43', 'gưaeg'),
(274, 2, NULL, 104, '2023-11-21 04:28:48', '2023-11-21 04:28:48', NULL),
(275, 2, NULL, 104, '2023-11-21 04:28:49', '2023-11-21 04:28:49', 'găg'),
(276, 2, NULL, 104, '2023-11-21 04:28:50', '2023-11-21 04:28:50', 'ăeg'),
(277, 1, NULL, 104, '2023-11-21 04:31:47', '2023-11-21 04:31:47', 'ff'),
(281, 6, NULL, 10, '2023-11-21 06:56:56', '2023-11-21 06:56:56', 'Lava Black'),
(282, 6, NULL, 10, '2023-11-21 06:57:14', '2023-11-21 06:57:14', 'Mint Green'),
(283, 6, NULL, 10, '2023-11-21 06:57:26', '2023-11-21 06:57:26', 'Steel Blue'),
(284, 6, NULL, 10, '2023-11-21 06:57:35', '2023-11-21 06:57:35', 'Steel Blue'),
(285, 7, NULL, 10, '2023-11-21 06:58:05', '2023-11-21 06:58:05', 'T-Rex Pro'),
(286, 7, NULL, 10, '2023-11-21 06:58:13', '2023-11-21 06:58:13', 'Active Edge - New Model'),
(287, 8, NULL, 8, '2023-11-21 07:38:57', '2023-11-21 07:38:57', '500 GB'),
(288, 8, NULL, 8, '2023-11-21 07:39:00', '2023-11-21 07:39:00', '1T'),
(289, 8, NULL, 8, '2023-11-21 07:39:09', '2023-11-21 07:39:09', '2T'),
(290, 9, NULL, 8, '2023-11-21 07:39:25', '2023-11-21 07:39:25', 'Intel Core i3'),
(291, 9, NULL, 8, '2023-11-21 07:39:34', '2023-11-21 07:39:34', 'AMD Ryzen 3'),
(292, 9, NULL, 8, '2023-11-21 07:39:37', '2023-11-21 07:39:37', 'AMD Ryzen 5'),
(293, 9, NULL, 8, '2023-11-21 07:39:42', '2023-11-21 07:39:42', 'AMD Ryzen 7'),
(294, 10, NULL, 8, '2023-11-21 07:40:15', '2023-11-21 07:40:15', 'GeForce GTX 1660 Ti'),
(295, 10, NULL, 8, '2023-11-21 07:40:23', '2023-11-21 07:40:23', 'GeForce GTX 1650'),
(296, 10, NULL, 8, '2023-11-21 07:40:29', '2023-11-21 07:40:29', 'GeForce GTX 1080 Ti'),
(297, 10, NULL, 8, '2023-11-21 07:40:33', '2023-11-21 07:40:33', 'GeForce RTX 3090'),
(298, 8, NULL, 8, '2023-11-21 07:42:03', '2023-11-21 07:42:03', '3T'),
(299, 8, NULL, 7, '2023-11-21 07:56:34', '2023-11-21 07:56:34', '250 GB'),
(300, 8, NULL, 7, '2023-11-21 07:56:38', '2023-11-21 07:56:38', '500 GB'),
(301, 11, NULL, 7, '2023-11-21 07:57:19', '2023-11-21 07:57:19', '8 GB'),
(302, 11, NULL, 7, '2023-11-21 07:57:23', '2023-11-21 07:57:23', '16 GB'),
(303, 10, NULL, 7, '2023-11-21 07:57:35', '2023-11-21 07:57:35', 'RTX 3050TI'),
(304, 11, NULL, 6, '2023-11-21 08:04:54', '2023-11-21 08:04:54', '8 GB'),
(305, 11, NULL, 6, '2023-11-21 08:04:58', '2023-11-21 08:04:58', '16 GB'),
(306, 8, NULL, 6, '2023-11-21 08:05:06', '2023-11-21 08:05:06', '250 GB'),
(307, 8, NULL, 6, '2023-11-21 08:05:12', '2023-11-21 08:05:12', '500 GB'),
(308, 9, NULL, 5, '2023-11-21 08:08:11', '2023-11-21 08:08:11', 'Ryzen 3 3250U'),
(309, 9, NULL, 5, '2023-11-21 08:08:20', '2023-11-21 08:08:20', 'Ryzen 5 6250U'),
(310, 11, NULL, 5, '2023-11-21 08:08:28', '2023-11-21 08:08:28', '8 GB'),
(311, 11, NULL, 5, '2023-11-21 08:08:32', '2023-11-21 08:08:32', '16 BG'),
(312, 11, NULL, 5, '2023-11-21 08:08:36', '2023-11-21 08:08:36', '4 GB'),
(314, 13, NULL, 1, '2023-11-21 08:15:09', '2023-11-21 08:15:09', 'iPhone X'),
(315, 13, NULL, 1, '2023-11-21 08:15:19', '2023-11-21 08:15:19', 'Galaxy Series'),
(316, 13, NULL, 1, '2023-11-21 08:15:25', '2023-11-21 08:15:25', 'iPod'),
(317, 12, NULL, 1, '2023-11-21 08:15:33', '2023-11-21 08:15:33', 'USB Type C'),
(318, 6, NULL, 9, '2023-11-21 08:19:08', '2023-11-21 08:19:08', 'Black/Red'),
(319, 6, NULL, 9, '2023-11-21 08:19:24', '2023-11-21 08:19:24', 'Black/Silver'),
(320, 6, NULL, 9, '2023-11-21 08:19:29', '2023-11-21 08:19:29', 'Black/Titan'),
(321, 7, NULL, 9, '2023-11-21 08:20:48', '2023-11-21 08:20:48', 'Stainless Steel'),
(322, 7, NULL, 9, '2023-11-21 08:20:57', '2023-11-21 08:20:57', 'Leather Strap'),
(323, 2, NULL, 11, '2023-11-27 21:03:43', '2023-11-27 21:03:43', '40mm'),
(324, 2, NULL, 11, '2023-11-27 21:03:47', '2023-11-27 21:03:47', '44mm'),
(325, 8, NULL, 11, '2023-11-27 21:04:06', '2023-11-27 21:04:06', '16GB'),
(326, 8, NULL, 11, '2023-11-27 21:04:12', '2023-11-27 21:04:12', '32GB'),
(327, 14, NULL, 12, '2023-11-27 21:09:02', '2023-11-27 21:09:02', 'Exynos W920'),
(328, 14, NULL, 12, '2023-11-27 21:09:11', '2023-11-27 21:09:11', 'Snapdragon 4100'),
(329, 15, NULL, 12, '2023-11-27 21:09:20', '2023-11-27 21:09:20', '5ATM'),
(330, 9, NULL, 52, '2023-11-27 21:10:54', '2023-11-27 21:10:54', 'Ryzen 3 3250U'),
(331, 9, NULL, 52, '2023-11-27 21:10:57', '2023-11-27 21:10:57', 'Ryzen 7 3250U'),
(332, 8, NULL, 53, '2023-11-27 21:11:51', '2023-11-27 21:11:51', '250 GB'),
(333, 8, NULL, 53, '2023-11-27 21:11:58', '2023-11-27 21:11:58', '500 GB'),
(334, 10, NULL, 51, '2023-11-27 21:13:09', '2023-11-27 21:13:09', 'RTX 3050TI'),
(335, 10, NULL, 51, '2023-11-27 21:13:16', '2023-11-27 21:13:16', 'RTX 3060'),
(336, 12, NULL, 54, '2023-11-27 21:14:05', '2023-11-27 21:14:05', 'USB Type C'),
(337, 13, NULL, 54, '2023-11-27 21:14:13', '2023-11-27 21:14:13', 'iPhone X'),
(338, 11, NULL, 54, '2023-11-27 21:14:24', '2023-11-27 21:14:24', '8 GB'),
(339, 10, NULL, 99, '2023-11-27 21:15:32', '2023-11-27 21:15:32', 'RTX 3050TI'),
(340, 8, NULL, 99, '2023-11-27 21:15:36', '2023-11-27 21:15:36', '250 GB'),
(341, 8, NULL, 99, '2023-11-27 21:15:42', '2023-11-27 21:15:42', '1 TB'),
(342, 16, NULL, 43, '2023-11-27 21:18:33', '2023-11-27 21:18:33', 'Darkfield High Precision'),
(343, 16, NULL, 43, '2023-11-27 21:18:44', '2023-11-27 21:18:44', '4000 DPI'),
(344, 17, NULL, 43, '2023-11-27 21:18:57', '2023-11-27 21:18:57', 'Windows'),
(345, 17, NULL, 43, '2023-11-27 21:19:04', '2023-11-27 21:19:04', 'MacOS');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `balance` decimal(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wallets`
--

INSERT INTO `wallets` (`id`, `user_id`, `balance`, `created_at`, `updated_at`) VALUES
(1, 4, 143.22, '2023-11-01 23:38:52', '2023-11-02 01:39:23'),
(2, 10, 0.00, '2023-11-02 03:53:34', '2023-11-02 03:53:51'),
(3, 11, 111.00, '2023-11-02 07:05:47', '2023-11-12 05:43:55'),
(4, 12, 0.00, '2023-11-12 19:19:02', '2023-11-12 19:19:02'),
(5, 26, 0.00, '2023-11-13 00:30:07', '2023-11-26 17:43:11'),
(6, 27, 0.00, '2023-11-13 01:05:01', '2023-11-13 01:05:01'),
(7, 28, 0.00, '2023-11-13 01:06:40', '2023-11-13 01:06:40'),
(8, 29, 0.00, '2023-11-13 01:08:22', '2023-11-13 01:13:14'),
(9, 30, 0.00, '2023-11-13 01:40:44', '2023-11-13 01:43:00'),
(10, 31, 0.00, '2023-11-14 04:25:33', '2023-11-14 04:25:33'),
(11, 32, 0.00, '2023-11-15 00:33:13', '2023-11-15 00:33:13'),
(12, 33, 0.00, '2023-11-15 00:34:23', '2023-11-15 00:34:23'),
(13, 34, 0.00, '2023-11-15 00:48:52', '2023-11-15 00:48:52'),
(14, 35, 0.00, '2023-11-15 00:56:45', '2023-11-15 00:56:45'),
(15, 36, 0.00, '2023-11-15 01:00:33', '2023-11-15 01:00:33'),
(16, 37, 0.00, '2023-11-15 01:01:13', '2023-11-15 01:01:13'),
(17, 38, 0.00, '2023-11-15 01:56:43', '2023-11-15 01:56:43'),
(18, 39, 0.00, '2023-11-15 06:07:49', '2023-11-15 06:07:49'),
(19, 40, 0.00, '2023-11-16 05:10:31', '2023-11-16 05:10:31'),
(20, 41, 0.00, '2023-11-17 00:57:56', '2023-11-17 00:57:56'),
(21, 43, 0.00, '2023-11-18 04:11:37', '2023-11-18 04:11:44'),
(22, 43, 0.00, '2023-11-18 04:12:12', '2023-11-18 04:12:12'),
(23, 43, 0.00, '2023-11-18 04:13:09', '2023-11-18 04:13:09'),
(24, 43, 0.00, '2023-11-18 04:20:17', '2023-11-18 04:20:17'),
(25, 44, 0.00, '2023-11-18 04:48:06', '2023-11-18 04:52:42'),
(26, 44, 0.00, '2023-11-18 04:49:15', '2023-11-18 04:49:15'),
(27, 44, 0.00, '2023-11-18 04:52:35', '2023-11-18 04:52:35'),
(28, 44, 0.00, '2023-11-18 04:55:49', '2023-11-18 04:55:49'),
(29, 43, 0.00, '2023-11-18 04:57:15', '2023-11-18 04:57:15'),
(30, 44, 0.00, '2023-11-18 04:58:11', '2023-11-18 04:58:11'),
(31, 44, 0.00, '2023-11-18 04:59:23', '2023-11-18 04:59:23'),
(32, 44, 0.00, '2023-11-18 05:01:03', '2023-11-18 05:01:03'),
(33, 1, 3248.32, '2023-11-21 05:12:21', '2023-11-28 02:41:05'),
(34, 44, 0.00, '2023-11-21 21:58:37', '2023-11-21 21:58:37'),
(35, 43, 0.00, '2023-11-22 20:16:38', '2023-11-22 20:16:38'),
(36, 43, 0.00, '2023-11-24 04:28:12', '2023-11-24 04:28:12'),
(37, 46, 0.00, '2023-11-24 04:28:36', '2023-11-24 04:28:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wishlists`
--

INSERT INTO `wishlists` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(11, 10, 1, '2023-11-24 05:58:50', '2023-11-24 05:58:50');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_comments_blog_id_foreign` (`blog_id`),
  ADD KEY `blog_comments_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `detail_blogs`
--
ALTER TABLE `detail_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `login_histories`
--
ALTER TABLE `login_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login_histories_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Chỉ mục cho bảng `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_colors_product_id_foreign` (`product_id`),
  ADD KEY `product_colors_color_id_foreign` (`color_id`);

--
-- Chỉ mục cho bảng `product_comments`
--
ALTER TABLE `product_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_comments_product_id_foreign` (`product_id`),
  ADD KEY `product_comments_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `skus`
--
ALTER TABLE `skus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `skus_sku_code_unique` (`sku_code`),
  ADD KEY `skus_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `sku_variants`
--
ALTER TABLE `sku_variants`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `variant_values`
--
ALTER TABLE `variant_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `variant_values_variant_id_foreign` (`variant_id`);

--
-- Chỉ mục cho bảng `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT cho bảng `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `detail_blogs`
--
ALTER TABLE `detail_blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `login_histories`
--
ALTER TABLE `login_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT cho bảng `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `product_comments`
--
ALTER TABLE `product_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT cho bảng `skus`
--
ALTER TABLE `skus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT cho bảng `sku_variants`
--
ALTER TABLE `sku_variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `variants`
--
ALTER TABLE `variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `variant_values`
--
ALTER TABLE `variant_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=346;

--
-- AUTO_INCREMENT cho bảng `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD CONSTRAINT `blog_comments_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`),
  ADD CONSTRAINT `blog_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `login_histories`
--
ALTER TABLE `login_histories`
  ADD CONSTRAINT `login_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_comments`
--
ALTER TABLE `product_comments`
  ADD CONSTRAINT `product_comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `variant_values`
--
ALTER TABLE `variant_values`
  ADD CONSTRAINT `variant_values_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `variants` (`id`);

--
-- Các ràng buộc cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
