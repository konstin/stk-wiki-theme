STK.ManageDownloads = {
    /**
        addKeyboardNavigation
        =====================
        Adds keyboard navigation to the accordion.
    */
    addKeyboardNavigation: function () {
        var link;
        $$('.accordion_toggle').each(function(toggle) {
            link = new Element('a', {href:'#downloads'});
            $A(toggle.childNodes).each(function(n) {
                link.appendChild(n);
            });
            toggle.appendChild(link);
/*            link.observe('focus', function () {
                toggle.addClassName('accordion_toggle_active');
//                toggle.removeClassName('accordion_toggle');
            });
            link.observe('blur', function () {
//                toggle.addClassName('accordion_toggle');
                toggle.removeClassName('accordion_toggle_active');
            });*/
            link.observe('keydown', function (e) {
                var elm = Event.element(e);
                switch (e.keyCode) {
                    case 13:
                        // Get toggle
                        var t = $(elm.parentNode);
                        // End event propogation
                        Event.stop(e);
                        // Open section
                        STK.dl_accordion.activate(t);
                        // Scroll to section
                        t.scrollTo();
                    break;
                }
            });
        });
    },

    /**
        offerBestDownloadLink
        =====================
        When a user comes to our download page, we try to detect their platform.  If
        successful, this function will open the accordion section with the best download for them, and scroll to that section.

        @param string accordion Accordion object to talk to
    */
    offerBestDownloadLink: function () {
        var accordion = STK.dl_accordion;

        switch(STK.user.platform) {
            case STK.platforms.other:
                //accordion.activate($('header_source'));
                //document.location = document.location+'#header_source';
            break;
            case STK.platforms.mac:
            case STK.platforms.macosx:
                accordion.activate($('header_mac'));
                document.location = document.location+'#header_mac';
            break;
            case STK.platforms.linux:
                accordion.activate($('header_linux'));
                var loc = new String(document.location);
		document.location = loc+'#header_linux';

		// Distro-specific packages are just too much out of date. Offer our own binary instead.
		/*
                // What flavour of Linux?
                var distro = STK.ManageDownloads.detectUserDistro();
                var infoSpan = new Element('span', {'class': 'distro_highlight'});
                switch (STK.user.distro) {
                    case STK.distros.ubuntu:
                        $('download_linux_ubuntu').insert({after: infoSpan});
                        infoSpan.appendChild(document.createTextNode(STK.lang.USING_UBUNTU.en));
                        if (loc.indexOf('#download_linux_ubuntu') == -1) document.location = loc+'#download_linux_ubuntu';
                    break;
                    case STK.distros.mandriva:
                        $('download_linux_mandriva').insert({after: infoSpan});
                        infoSpan.appendChild(document.createTextNode(STK.lang.USING_MANDRIVA.en));
                        if (loc.indexOf('#download_linux_mandriva') == -1) document.location = loc+'#download_linux_mandriva';
                    break;
                    case STK.distros.suse:
                        $('download_linux_suse').insert({after: infoSpan});
                        infoSpan.appendChild(document.createTextNode(STK.lang.USING_SUSE.en));
                        if (loc.indexOf('#download_linux_suse') == -1) document.location = loc+'#download_linux_suse';
                    break;
                    case STK.distros.debian:
                        $('download_linux_debian').insert({after: infoSpan});
                        infoSpan.appendChild(document.createTextNode(STK.lang.USING_DEBIAN.en));
                        if (loc.indexOf('#download_linux_debian') == -1) document.location = loc+'#download_linux_debian';
                    break;
                    case STK.distros.other:
                        if (loc.indexOf('#header_linux') == -1) document.location = loc+'#header_linux';
                    break;
                }
		*/
            break;
            case STK.platforms.windows:
                accordion.activate($('header_win'));
                document.location = document.location+'#header_win';
            break;
            case STK.platforms.bsd:
              accordion.activate($('header_bsd'));
              document.location = document.location+'#header_bsd';
            break;
            case STK.platforms.solaris:
              accordion.activate($('header_solaris'));
              document.location = document.location+'#header_solaris';
            break;
        }
    },

    /**
        detectUserPlatform
        =====================
        Do platform detection. Sets variable STK.user.platform
        
        @return int Platform our user is (probably) on
    */
    detectUserPlatform: function () {
        var p = new String(navigator.platform).toLowerCase();
        var platform;
        if (p.indexOf("win32") != -1)
          platform = STK.platforms.windows;
        else if (p.indexOf("linux") != -1)
          platform = STK.platforms.linux;
        else if (p.indexOf("mac os x") != -1)
          platform = STK.platforms.macosx;
        else if (p.indexOf("msie 5.2") != -1)
          platform = STK.platforms.mac;
        else if (p.indexOf("mac") != -1)
          platform = STK.platforms.mac;
        else if (p.indexOf("bsd") != -1)
          platform = STK.platforms.bsd;
        else if (p.indexOf("sunos") != -1)
          platform = STK.platforms.solaris;
        else
          platform = STK.platforms.other;

        if (p.length == 0 ) {
            var u = new String(navigator.userAgent).toLowerCase();
            if (u.indexOf("win32") != -1)
              platform = STK.platforms.windows;
            else if (u.indexOf("linux") != -1)
              platform = STK.platforms.linux;
            else if (u.indexOf("mac os x") != -1)
              platform = STK.platforms.macosx;
            else if (u.indexOf("msie 5.2") != -1)
              platform = STK.platforms.mac;
            else if (u.indexOf("mac") != -1)
              platform = STK.platforms.mac;
            else if (u.indexOf("bsd") != -1)
              platform = STK.platforms.bsd;
            else if (u.indexOf("sunos") != -1)
              platform = STK.platforms.solaris;
            else
              platform = STK.platforms.other;
        }          

        STK.user.platform = platform;
        return platform;
    },

    /**
        detectUserDistro
        =====================
        Do linux distro detection. Sets variable STK.user.distro
        
        @return int Distro our user is using
    */
    detectUserDistro: function () {
        var distro = new String('');
        // Start by scanning user agent string    
        var u = new String(navigator.userAgent).toLowerCase();
        if (u.indexOf("debian") != -1)
          distro = STK.distros.debian;
        else if (u.indexOf("mandriva") != -1)
          distro = STK.distros.mandriva;
        else if (u.indexOf("suse") != -1)
          distro = STK.distros.suse;
        else if (u.indexOf("ubuntu") != -1)
          distro = STK.distros.ubuntu;

        // Now try vendor if we got nothing
        if (distro.length == 0) {
            var v = new String(navigator.vendor);
            if (v.indexOf("debian") != -1)
              distro = STK.distros.debian;
            else if (v.indexOf("mandriva") != -1)
              distro = STK.distros.mandriva;
            else if (v.indexOf("suse") != -1)
              distro = STK.distros.suse;
            else if (v.indexOf("ubuntu") != -1)
              distro = STK.distros.ubuntu;
            else
              distro = STK.distros.other;
        }

        STK.user.distro = distro;
        return distro;
    }
}

