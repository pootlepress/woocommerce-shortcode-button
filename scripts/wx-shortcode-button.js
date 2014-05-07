(
    function() {

        tinymce.PluginManager.add('PootlepressWooCommerceShortcodes', function (editor, url) {

            editor.addCommand('pootlepress_wx_insert_immediate', function (ui, v) {
                editor.insertContent('[' + v + ']');
            });

            var ed = tinymce.activeEditor;
            editor.addButton('pootlepress_wx_shortcode_button', {
                type: 'menubutton',
                text: "Woocommerce",
                icon: false,
                menu: [
                    {text: ed.getLang('woocommerce.order_tracking'), onclick: function () {
                        ed.execCommand("pootlepress_wx_insert_immediate", false, ed.getLang('woocommerce.order_tracking_shortcode'))
                    }},
                    {text: ed.getLang('woocommerce.price_button'), onclick: function () {
                        ed.execCommand("pootlepress_wx_insert_immediate", false, 'add_to_cart id="" sku=""')
                    }},
                    {text: ed.getLang('woocommerce.product_by_sku'), onclick: function () {
                        ed.execCommand("pootlepress_wx_insert_immediate", false, 'product id="" sku=""')
                    }},
                    {text: ed.getLang('woocommerce.products_by_sku'), onclick: function () {
                        ed.execCommand("pootlepress_wx_insert_immediate", false, 'products ids="" skus=""')
                    }},
                    {text: ed.getLang('woocommerce.product_categories'), onclick: function () {
                        ed.execCommand("pootlepress_wx_insert_immediate", false, 'product_categories number=""')
                    }},
                    {text: ed.getLang('woocommerce.products_by_cat_slug'), onclick: function () {
                        ed.execCommand("pootlepress_wx_insert_immediate", false, 'product_category category="" per_page="12" columns="4" orderby="date" order="desc"')
                    }},
                    {text: ed.getLang('woocommerce.recent_products'), onclick: function () {
                        ed.execCommand("pootlepress_wx_insert_immediate", false, 'recent_products per_page="12" columns="4" orderby="date" order="desc"')
                    }},
                    {text: ed.getLang('woocommerce.featured_products'), onclick: function () {
                        ed.execCommand("pootlepress_wx_insert_immediate", false, 'featured_products per_page="12" columns="4" orderby="date" order="desc"')
                    }},
                    {text: ed.getLang('woocommerce.shop_messages'), onclick: function () {
                        ed.execCommand("pootlepress_wx_insert_immediate", false, ed.getLang('woocommerce.shop_messages_shortcode'))
                    }}
                ]
            });
        });
    }
    )();