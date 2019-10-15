import vuepost from '../components/admin/VuePost.vue'
import table from '../components/admin/Table.vue'
import cmd from '../components/Cmd.vue'
import addcat from '../components/admin/AddCat.vue'
import editcat from '../components/admin/Editcatagory.vue'
import posts from '../components/admin/posts/Allpost.vue'
import addpost from '../components/admin/posts/addpost.vue'
import ui from '../components/public/Ui.vue'


export const routes = [{
        path: '/contact',
        component: cmd
    },
    {
        path: '/table',
        component: table
    },
    {
        path: '/addcat',
        component: addcat
    },
    {
        path: '/editcatagory/:id/:name',
        component: editcat
    },
    {
        path: '/posts',
        component: posts
    }, {
        path: '/addpost',
        component: addpost
    }
];
