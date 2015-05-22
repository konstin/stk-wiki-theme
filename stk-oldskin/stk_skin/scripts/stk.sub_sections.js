STK.ManageSections = {
    init: function (page, container, hLevel) {
        // Get page title
        var thisPage;
        if (!$('page_title')) return; // Main page doesn't have a title, return
        /*$A($('page_title').childNodes).each(function (node) {
            if (node.nodeType == 3)
                thisPage = node.nodeValue;
        });*/
        thisPage = $$('body')[0].identify();

        // Add accordion class names
        container = $(container);
        if (thisPage.toLowerCase() == page.toLowerCase()) {
            var subHeading;
            var subSection;
            var elms = $A(container.childNodes);
            var elm;
            for (var i = 0; i < elms.length; i ++) {
                elm = $(elms[i]);
                if (elm.nodeName.toLowerCase() == 'h'+hLevel) {
                    subHeading = elm;
                    subHeading.addClassName('accordion_toggle');
                    // Find section to toggle
                    subSection = subHeading.next('div')
                    subSection.addClassName('accordion_content');
                    subSection.hide();
                }
            };
            STK.dl_accordion = new accordion(container);
            STK.ManageDownloads.addKeyboardNavigation();
            STK.ManageDownloads.detectUserPlatform();
            STK.ManageDownloads.offerBestDownloadLink();
       }
    }
}


