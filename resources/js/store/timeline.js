import axios from "axios";
export default {
    namespaced: true,
    state: {
        tweets: []
    },

    getters: {
        tweets(state) {
            return state.tweets;
        }
    },

    mutations: {
        PUSH_TWEETS(state, data) {
            state.tweets.push(...data);
        }
    },

    actions: {
        async getTweets({ commit }) {
            let res = await axios.get("/api/timeline");
            commit("PUSH_TWEETS", res.data.data);
        }
    }
};
