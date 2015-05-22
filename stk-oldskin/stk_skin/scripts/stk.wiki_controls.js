STK.WikiControls = {
    init:function () {
        // Hide controls heading
        var headingControls = $('heading_controls');
        if (headingControls && headingControls != null) headingControls.hide();
        // Move controls to top of page (they are at the bottom so browsers without JS don't have this mass of links before content)
        var controlsElm = $('wikiControls');
        controlsElm.addClassName('dynamic');
        if (controlsElm && controlsElm != null) {
            $('content').appendChild(controlsElm);
            $A($('content').childNodes).each(function(n) {
                if ($(n).nodeType != 3) {
                    if ($(n).id != 'wikiControls') { $('content').appendChild(n); }
                }
            });
        }
        // Let the description element know so it moves down
        var descript = $('description');
        if (descript && descript != null) {descript.addClassName('afterWikiControls')};

        // Set up menus
        var gotEdit = ($('editMiniMenu') && $('editMiniMenu') != null);
        var gotUser = ($('userMenu') && $('userMenu') != null);

        // Edit menu
        if (gotEdit) {
            var editMenu = $('editMiniMenu');
            var editToggle = $$('#editMenu .toggle')[0];

            editMenu.hide();
            editToggle.observe('click', function() {
                STK.WikiControls.toggleMenu(editMenu);
                if ($('userMenu')) STK.WikiControls.hideMenu(userMenu);
            });
        }

        // User menu
        if (gotUser) {
            var userMenu = $('userMenu');
            var userToggle = $$('#userLinks .toggle')[0];

            userMenu.hide()
            userToggle.observe('click', function() {
                STK.WikiControls.toggleMenu(userMenu);
                if ($('editMenu')) STK.WikiControls.hideMenu(editMenu);
            });
        }

        // Compact search field
        var searchLabel = $$('#searchForm label')[0];
        var searchField = $('searchField');
        searchField.value = searchLabel.childNodes[0].data;
        searchLabel.remove();
        searchField.observe('focus', function () {
            if (this.value == 'Search') this.value = '';
        }.bind(searchField));
        searchField.observe('blur', function () {
            if (this.value == '') this.value = 'Search';
        }.bind(searchField));
    },

    showMenu:function (menu) {
        $(menu).addClassName('popup');
        $(menu).show();
    },

    hideMenu:function (menu) {
        $(menu).removeClassName('popup');
        $(menu).hide();
    },

    toggleMenu:function (menu) {
        if (menu.style.display == 'none')
            STK.WikiControls.showMenu(menu);
        else
            STK.WikiControls.hideMenu(menu);
    }
}
