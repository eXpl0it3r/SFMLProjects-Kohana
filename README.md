# SFML Projects

While the SFML forum provides a section for [projects](http://en.sfml-dev.org/forums/index.php?board=10.0), it happens too often that nice projects get lost in the depth of that sub-forum or that the archive with the game gets deleted. With the [SFML Projects](http://www.sfmlprojects.org/) website we want to provide a platform to host, share and archive projects that were made with or for [SFML](http://www.sfml-dev.org/).

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

