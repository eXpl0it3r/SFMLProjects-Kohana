--
-- Dumping data for table `navigations`
--

INSERT INTO `navigations` (`id`, `route`, `name`, `parent_id`, `visible`) VALUES
(1, '/home/', 'Home', NULL, 1);

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `route`, `language`, `title`, `content`) VALUES
(1, 'home', 'en', 'Home', '<div class="container" id="content">\r\n	<div class="jumbotron">\r\n		<div class="row">\r\n			<div class="col-lg-12">\r\n				<h1>SFML Projects</h1>\r\n			</div>\r\n		</div>\r\n		<div class="row">\r\n			<div class="col-lg-3">\r\n				<img class="img-responsive" src="/assets/img/icon-large-text.png" alt="SFML Projects Logo">\r\n			</div>\r\n			<div class="col-lg-9">\r\n				<p>With the website we want to provide a platform to host, share and archive projects that were made with <a href="http://www.sfml-dev.org/">SFML</a>. However to reach the goal there\\''s a lot of work that needs to be done first. If you have ideas, suggestions or even want to help build this site, don\\''t hesitate to contact us.</p>\r\n				<p>\r\n					<a class="btn btn-lg btn-primary" href="http://www.twitter.com/SFMLProjects/" role="button" title="@SFMLProjects" target="_blank"><span class="fa fa-twitter-square fa-2x"></span> Twitter</a>\r\n					<a class="btn btn-lg btn-primary" href="http://irc.lc/irc.boxbox.org:6667/sfmlprojects/webirc" role="button" title="irc.boxbox.org:6667 #sfmlprojects" target="_blank"><span class="fa fa-comment fa-2x"></span> IRC</a>\r\n 					<a class="btn btn-lg btn-primary" href="mailto:info@sfmlprojects.org" role="button" title="info@sfmlprojects.org" disabled="disabled"><span class="fa fa-envelope fa-2x"></span> E-Mail</a>\r\n					<a class="btn btn-lg btn-primary pull-right" href="http://www.sfml-dev.org/" role="button" title="www.sfml-dev.org" target="_blank">SFML <span class="fa fa-external-link"></span></a>\r\n				</p>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>\r\n'),
(2, 'terms', 'en', 'Terms', '<div class="container" id="content">\r\n	<div class="row">\r\n		<div class="col-lg-offset-2 col-lg-7">\r\n			<p>\r\n				<h1>Terms of Use</h1>\r\n				<h3>Age</h3>\r\n				<ul>\r\n					<li>By using this site you must be at least thirteen (13) years of age OR have permission of your legal guardian OR parent</li>\r\n					<li>This site does not knowingly collect, either online or offline, personal information from persons under the age of thirteen (13).</li>\r\n				</ul>\r\n				<h3>Language</h3>\r\n				<ul>\r\n					<li>This site is designed for people of all ages including minors.</li>\r\n					<li>By using this site you agree to avoid using any language that is considered offensive/vulgar/inappropriate OR any other language that an administrator deems unfit.</li>\r\n					<li>Failure to comply with these rules gives any administrator the full rights to ban OR delete your account.</li>\r\n				</ul>\r\n				<h3>Security</h3>\r\n				<ul>\r\n					<li>The security of your account is yours alone.</li>\r\n					<li>By using this site you acknowledge that this site is not responsible if you share any personal account information which may compromise your account.</li>\r\n				</ul>\r\n				<h3>Liability</h3>\r\n				<ul>\r\n					<li>By using this site you agree that you will not hold this site accountable for any damage done to either you or anything you own.</li>\r\n					<li>This site is provided free of charge and has no obligation to serve your needs/wants.</li>\r\n					<li>This site is also not responsible for any compromised passwords. Always use different passwords for each site.</li>\r\n				</ul>\r\n			</p>\r\n		</div>\r\n	</div>\r\n</div>\r\n'),
(3, 'legal', 'en', 'Legal Notice', '<div class="container" id="content">\r\n	<div class="row">\r\n		<div class="col-lg-3 col-md-offset-3">\r\n			<h2>Legal Notice</h2>\r\n			<br>\r\n			Lukas Dürrenberger<br>\r\n			Forchstrasse 28<br>\r\n			8610 Uster\r\n		</div>\r\n		<div class="col-lg-3">\r\n			<h2>&nbsp;</h2>\r\n			<div class="well well-lg">\r\n				<ul class="list-unstyled">\r\n					<li><i class="fa fa-envelope"></i>&nbsp;&nbsp;<a href="mailto:info@sfmlprojects.org">E-Mail</a></li>\r\n					<li><i class="fa fa-twitter"></i>&nbsp;&nbsp;<a href="https://twitter.com/SFMLProjects">Twitter</a></li>\r\n				</ul>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>\r\n');

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `logins`, `last_login`) VALUES
(1, 'dev@sfmlprojects.org', 'admin', 'd66420f0b9b8f17e4a0858e659aed4f6eadbcf35ded6a4915702253a99591f8b', 0, '2014-02-26 16:07:52');

