var STK = {
    lang: {
        USING_DEBIAN: {en: 'It looks like you\'re using Debian Linux. We recommend this download.'},
        USING_SUSE: {en: 'It looks like you\'re using SUSE/openSUSE Linux. We recommend this download.'},
        USING_MANDRIVA: {en: 'It looks like you\'re using Mandriva Linux. We recommend this download.'},
        USING_UBUNTU: {en: 'It looks like you\'re using Ubuntu Linux. We recommend this download.'}
    },

    user: {
        platform: '',
        distro: ''
    },
    
    platforms: {
        other: 0,
        windows: 1,
        linux: 2,
        macosx: 3,
        mac: 4,
        bsd: 5,
        solaris: 6
    },

    distros: {
        other: 0,
        debian: 1,
        mandriva: 2,
        suse: 3,
        ubuntu: 4
    },

    dl_accordion: ''
};

