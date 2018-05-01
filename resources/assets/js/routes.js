import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        component: require('./Views/Home')
    },

    {
        path: '/agenda',
        component: require('./Views/Agenda')
    },

    {
        path: '/agenda/page/:id',
        component: require('./components/Agenda/ClickPage/Page')
    },

    {
        path: '/nieuws',
        component: require('./Views/Nieuws')
    },

    {
        path: '/nieuws/page/:id',
        component: require('./components/News/ClickPage/Page')
    },

    {
        path: '/fotos',
        component: require('./Views/Fotos')
    },

    {
        path: '/over-ons',
        component: require('./Views/OverOns')
    },

    {
        path: '/ruimtes',
        component: require('./Views/Ruimtes')
    },


    {
        path: '/contact',
        component: require('./Views/Contact')
    },
];

export default new VueRouter({
    routes,
    linkActiveClass: 'is-active'
});
