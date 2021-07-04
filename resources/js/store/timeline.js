import axios from "axios";
import { get } from "lodash";

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

                if (get(tweet.original_tweet, "id") === id) {
                    tweet.original_tweet.likes_count = count;
                }

                return tweet;
            });
        },

        SET_RETWEETS(state, { id, count }) {
            state.tweets = state.tweets.map(tweet => {
                if (tweet.id === id) {
                    tweet.retweets_count = count;
                }

                if (get(tweet.original_tweet, "id") === id) {
                    tweet.original_tweet.retweets_count = count;
                }

                return tweet;
            });
        },
        SET_REPLIES(state, { id, count }) {
            state.tweets = state.tweets.map(tweet => {
                if (tweet.id === id) {
                    tweet.reply_count = count;
                }

                if (get(tweet.original_tweet, "id") === id) {
                    tweet.original_tweet.reply_count = count;
                }

                return tweet;
            });
        },

        POP_TWEET(state, id) {
            state.tweets = state.tweets.filter(tweet => {
                return tweet.id != id;
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
            //Simillarly, grabs retweets
            commit("retweets/PUSH_RETWEETS", res.data.meta.retweets, {
                root: true
            });

            return res;
        },

        async quoteTweet(_, { tweet, data }) {
            await axios.post(`/api/tweets/${tweet.id}/quotes`, data);
        },

        async replyToTweet(_, { tweet, data }) {
            await axios.post(`/api/tweets/${tweet.id}/replies`, data);
        }
    }
};
