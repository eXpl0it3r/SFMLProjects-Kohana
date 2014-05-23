# SFML Projects

While the SFML forum provides a section for [projects](http://en.sfml-dev.org/forums/index.php?board=10.0), it happens too often that nice projects get lost in the depth of that sub-forum or that the archive with the game gets deleted. With the [SFML Projects](http://www.sfmlprojects.org/) website we want to provide a platform to host, share and archive projects that were made with or for [SFML](http://www.sfml-dev.org/).

## Contribute

Since this project is open source, I very gladly take in contributions. You can do this by utilizing GitHub's ways of forking and creating pull requests or by joining the IRC channel #sfmlprojects on irc.boxbox.org and talk to me. I'll also hand out commit rights to people that seem eager to help an can follow these few rules:

* The SFML Projects uses the conventions and code style defined by the [Kohana team](http://kohanaframework.org/3.3/guide/kohana/conventions).
* The SFML projects uses the Gitflow workflow as "invented" by [nvie](http://nvie.com/posts/a-successful-git-branching-model/) and nicely described [here](https://www.atlassian.com/de/git/workflows#!workflow-gitflow) by Atlassian.
* For every non-trivial change a pull request needs to be created, so I or others can review the changes.
* The only one merging pull requests into the dev or master branch is eXpl0it3r.

## Install

I'm not a fan of all these package manager and thus the install process is simply using Git.

### Download

```
git clone https://github.com/eXpl0it3r/SFMLProjects
git submodule update --init --recursive
```

### Configure

* Make sure your web server points to `/path/to/SFMLProjects/public` since the `index.php` is located there.
* Make sure the directories `application/log` and `application/cache` are writeable.
* Change `Cookie::$salt` in `application/bootstrap.php` to your own custom salt.
* Change the variables in the application/config/*.example files and remove the .example extension.
* To check that Kohana is ready to go, copy the `install.php` to `/path/to/SFMLProjects/public`.
* Browse to your fresh SFML Projects install, which should launch `install.php` via the `index.php`.
* Make sure every mandatory point is green.
* Remove the `install.php` afterwards.

That's basically it. From here on you can now start with the project files itself.

## Dependencies

### Back-end

* [Kohana](http://kohanaframework.org/)
* [KOstache](https://github.com/zombor/KOstache/)
 * [Mustache.php](https://github.com/bobthecow/mustache.php/)

### Front-end

* [Bootstrap](http://getbootstrap.com/)
* [Jasny Boostrap](http://jasny.github.io/bootstrap/)
* [Font Awesome](http://fontawesome.io/)
* [jQuery](http://jquery.com/)

## License

The software created for the website is under the MIT license, see LICENSE for details. The dependencies licenses can be found in the licenses directory.

