import Axios from "axios";

export default {
    state: {
        catagorey: [],
        posts: [],
        allcategories: [],
    },
    getters: {
        getCatagoryValue(state) {
            return state.catagorey
        },
        getPostsValue(state) {
            return state.posts
        },
        allcategories(state) {
            return state.allcategories
        }
    },
    actions: {
        getAllCatagory(payload) {
            Axios.get('/catagory')
                .then((response) => payload.commit('alldatafromcatagory', response.data.catagories))
            //console.log(response.data.catagories);

        },
        getAllPosts(payload) {
            Axios.get('/posts')
                .then((response) =>
                    payload.commit('alldatafromposts', response.data.posts)
                )


        },
        allcategories(context) {
            axios.get('/categories')
                .then((response) => {

                    context.commit('allcategories', response.data.categories)
                })
        }
    },
    mutations: {
        alldatafromcatagory(state, data) {
            return state.catagorey = data
        },
        alldatafromposts(state, data) {
            return state.posts = data
        },
        allcategories(state, payload) {
            //console.log(payload);
            return state.allcategories = payload
        }
    }
}
