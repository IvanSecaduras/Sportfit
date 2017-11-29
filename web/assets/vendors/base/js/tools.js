var PortletTools = function () {
    n = function () {
        $("#m_portlet_tools_3").mPortlet({});
        $("#m_portlet_tools_4").mPortlet({});
        $("#m_portlet_tools_5").mPortlet({});
        $("#m_portlet_tools_6").mPortlet({});
        $("#m_portlet_tools_7").mPortlet({});
    };
    return {
        init: function () {
            n()
        }
    }
}();
jQuery(document).ready(function () {
    PortletTools.init()
});

