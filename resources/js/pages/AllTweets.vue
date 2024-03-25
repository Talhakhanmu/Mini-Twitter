<template>
    <body>
        <MainHeader />
        <main>
            <!-- List of tweets -->
            <div class="tweet-list">
                <div class="intro">
                    <h2>Feed von</h2>
                    <h1>Muhammad Talha Khan</h1>
                </div>
                <!-- repeat the each tweet -->
                <div class="tweet" v-for="tweet in tweets" :key="tweet.id">
                    <!-- Display the formatted date -->
                    <div class="date">{{ formatDate(tweet.updated_at) }}</div>
                    <!-- Tweet title -->
                    <h3 class="tweet-title">{{ tweet.title }}</h3>
                    <!-- Tweet body -->
                    <div class="tweet-description">{{ tweet.content }}</div>
                    <!-- Tweet actions -->
                    <div>
                        <!-- Button to show individual tweet -->
                        <router-link
                            :to="`/tweets/show/${tweet.id}`"
                            class="show-tweet-button"
                            >Tweet ansehen
                        </router-link>
                    </div>
                </div>
            </div>
        </main>
        <MainFooter />
    </body>
</template>

<script>
import MainHeader from "./components/MainHeader.vue";
import MainFooter from "./components/MainFooter.vue";
import axios from "axios";

export default {
    data() {
        return {
            tweets: [],
        };
    },

    components: {
        MainHeader,
        MainFooter,
    },

    mounted() {
        // Fetch tweets when component is mounted
        this.fetchTweets();
    },

    methods: {
        async fetchTweets() {
            try {
                // Fetch tweets from API
                const response = await axios.get("/api/tweets");
                // Set fetched tweets to local data
                this.tweets = response.data;
            } catch (error) {
                // Log error if fetching tweets fails
                console.error("Error fetching tweets:", error);
            }
        },

        formatDate(dateString) {
            // Ensure dateString is valid
            if (!dateString) return ""; // Return empty string if date string is not provided
            // Parse the date string and extract year, month, and day
            const date = new Date(dateString);
            const year = date.getFullYear();
            const month = ("0" + (date.getMonth() + 1)).slice(-2); // Adding leading zero if needed
            const day = ("0" + date.getDate()).slice(-2); // Adding leading zero if needed
            // Construct the formatted date string with dots
            return `${day}.${month}.${year}`;
        },
    },
};
</script>

<style scoped>
h2 {
    margin-top: 20px;
    font-family: Inter;
    font-size: 18px;
    font-weight: 700;
    line-height: 19.36px;
    letter-spacing: 0.05em;
    text-align: left;
    color: #888888;
}
h1 {
    font-family: Inter;
    font-size: 32px;
    font-weight: 700;
    line-height: 38.73px;
    text-align: left;
    margin-top: 10px;
    margin-bottom: 50px;
}
.date {
    margin: 0%;
    padding-right: 21px;
    padding-top: 17px;
    display: flex;
    justify-content: right;
    font-family: Inter;
    font-size: 14px;
    font-weight: 600;
    text-align: left;
    color: #888888;
}
.tweet-list {
    display: flex;
    flex-direction: column;
    margin: 50px;
}
.tweet-description {
    padding-top: 10px;
    padding-left: 37px;
    padding-bottom: 10px;
    font-family: Inter;
    font-size: 20px;
    font-weight: 400;
    color: #444444;
}
.tweet-title {
    width: 100%;
    margin-top: 14px;
    margin-bottom: 0px;
    margin-left: 37px;
    font-family: Inter;
    font-size: 20px;
    font-weight: 700;
    text-align: left;
    color: black;
}
.tweet {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    width: 768px;
    min-height: 199px;
    border-radius: 8px;
    border: 1px;
    border: 1px solid #d9d9d9;
    background-color: rgb(255, 255, 255);
    margin-bottom: 10px;
}
.show-tweet-button {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 140px;
    height: 25px;
    margin-left: 37px;
    padding: 10px 15px 10px 15px;
    border-radius: 8px;
    background-color: #222222;
    text-decoration: none;
    color: white;
    font-family: Inter;
    font-size: 18px;
    font-weight: 400;
    margin-bottom: 27px;
    transition: background-color 0.3s, transform 0.2s;
}

.show-tweet-button:hover {
    background-color: #333333;
    transform: scale(1.05);
}
</style>
