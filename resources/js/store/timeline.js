import axios from "axios";
export default {
    namespaced: true,
    state: {
        tweets: []
    },

    getters: {
        tweets(state) {
            return state.tweets.sort((a, b) => b.created_at - a.created_at);
        }
    },

    mutations: {
        //data.filter removes any tweets with duplicate ids
        PUSH_TWEETS(state, data) {
            state.tweets.push(
                ...data.filter(tweet => {
                    return !state.tweets.map(t => t.id).includes(tweet.id);
                })
            );
        },

        SET_LIKES(state, { id, count }) {
            state.tweets = state.tweets.map(tweet => {
                if (tweet.id === id) {
                    tweet.likes_count = count;
                }

                return tweet;
            });
        }
    },

    actions: {
        async getTweets({ commit }, url) {
            let res = await axios.get(url);
            commit("PUSH_TWEETS", res.data.data);

            //Grabs users likes from api response
            commit("likes/PUSH_LIKES", res.data.meta.likes, {
                root: true
            });

            return res;
        }
    }
};
