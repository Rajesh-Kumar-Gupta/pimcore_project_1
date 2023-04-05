pimcore.registerNS("pimcore.plugin.HelloBundle");

pimcore.plugin.HelloBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.HelloBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("HelloBundle ready!");
    }
});

var HelloBundlePlugin = new pimcore.plugin.HelloBundle();
let navEl = Ext.get('pimcore_menu_search').insertSibling('<li id="pimcore_menu_mds" data-menu-tooltip="mds extension" class="pimcore_menu_item pimcore_menu_needs_children">mds extension</li>', 'after');
const menu = new Ext.menu.Menu({
    items: [{
        text: "Item 1",
        iconCls: "pimcore_icon_apply",
        handler: function () {
            alert("pressed 1");
        }
    }, {
        text: "Item 2",
        iconCls: "pimcore_icon_delete",
        handler: function () {
            alert("pressed 2");
        }
    }],
    cls: "pimcore_navigation_flyout"
});
pimcore.layout.toolbar.prototype.mdsMenu = menu;


document.addEventListener(pimcore.events.pimcoreReady, (e) => {
    let toolbar = pimcore.globalmanager.get("layout_toolbar");
    navEl.on("mousedown", toolbar.showSubMenu.bind(toolbar.mdsMenu));

    const mdsMenuReady = new CustomEvent("mdsMenuReady", {
        detail: {
            mdsMenu: toolbar.mdsMenu,
            type: "document"
        }
    });

    document.dispatchEvent(mdsMenuReady);
});
