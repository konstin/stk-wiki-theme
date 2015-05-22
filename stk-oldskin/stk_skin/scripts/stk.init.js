document.observe('dom:loaded', STK.WikiControls.init);
document.observe('dom:loaded', STK.ManageSections.init.bind(this, 'Downloads', 'downloads_container', '3'));
document.observe('dom:loaded', STK.SearchTidy.init);

