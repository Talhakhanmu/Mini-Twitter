<script>
import axios from "axios";
import MainHeader from "./components/MainHeader.vue";
import MainFooter from "./components/MainFooter.vue";

export default {
    data() {
        return {
            tweet: {}, // Initialize an empty object to store the tweet data
        };
    },
    components: {
        MainHeader,
        MainFooter,
    },
    mounted() {
        // Fetch the tweet data when the component is mounted
        this.fetchTweet();
    },
    methods: {
        // Fetches the tweet data from the backend
        async fetchTweet() {
            const tweetId = this.$route.params.id;
            try {
                const response = await axios.get(`/api/tweets/${tweetId}`);
                this.tweet = response.data; // Assign fetched tweet data to the tweet object
            } catch (error) {
                console.error("Error fetching tweet:", error);
            }
        },
        // Redirects to the edit tweet page
        editTweet() {
            this.$router.push(`/tweets/edit/${this.tweet.id}`);
        },
        // Deletes the tweet
        async deleteTweet() {
            try {
                await axios.delete(`/api/tweets/${this.tweet.id}`);
                // Redirects to the all tweets page after deletion
                this.$router.push("/all/tweets");
                console.log("Tweet deleted successfully");
            } catch (error) {
                console.error("Error deleting tweet:", error);
            }
        },
        // Format date to day.month.year pattern
        formatDate(dateString) {
            // Ensure dateString is valid
            if (!dateString) return ""; // Return empty string if date string is not provided
            // Parse the date string and extract year, month, and day
            const date = new Date(dateString);
            const day = ("0" + date.getDate()).slice(-2); // Adding leading zero if needed
            const month = ("0" + (date.getMonth() + 1)).slice(-2); // Adding leading zero if needed
            const year = date.getFullYear();
            // Construct the formatted date string with dots
            return `${day}.${month}.${year}`;
        },
    },
};
</script>
<template>
    <MainHeader />
    <div class="container-main">
        <div class="content">
            <!-- Display the formatted date -->
            <div class="date">
                TWEET VOM &nbsp;&nbsp;&nbsp;&nbsp;{{
                    formatDate(tweet.updated_at)
                }}
            </div>

            <h2 class="heading">{{ tweet.title }}</h2>
            <div class="description">{{ tweet.content }}</div>

            <!-- Buttons for actions -->
            <div class="buttons">
                <button @click="editTweet" class="button-1">
                    Tweet bearbeiten
                </button>
                <button @click="deleteTweet" class="button-2">
                    Tweet löschen
                </button>
            </div>
        </div>
    </div>
    <footer>
        <MainFooter />
    </footer>
</template>

<style scoped>
.buttons {
    display: flex;
    margin-top: 20px;
}
.content {
    width: 768px;
}
.container-main {
    display: flex;
    flex-direction: column;
    justify-content: center;
    margin-left: 370px;
}
.heading {
    font-family: Inter;
    font-size: 32px;
    font-weight: 700;
    line-height: 38.73px;
    text-align: left;
    padding-top: 50px;
}
.button-1 {
    width: 150px;
    height: 38px;
    border-radius: 8px;
    background: #000000;
    font-family: Inter;
    font-size: 14px;
    font-weight: 400;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    margin-top: 18px;
    transition: background-color 0.3s, transform 0.2s;
}

.button-2 {
    width: 150px;
    height: 38px;
    border-radius: 8px;
    background: #f70000;
    font-family: Inter;
    font-size: 14px;
    font-weight: 400;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    margin-top: 18px;
    margin-left: 20px;
    transition: background-color 0.3s, transform 0.2s;
}

.button-1:hover {
    background: #333333;
    transform: scale(1.05);
}

.button-2:hover {
    background: #b80000;
    transform: scale(1.05);
}
.description {
    font-family: Inter;
    font-size: 24px;
    font-weight: 400;
    line-height: 29.05px;
    text-align: left;
    color: #444444;
}
.date {
    margin-top: 50px;
    padding-right: 21px;
    padding-top: 17px;
    display: flex;
    font-family: Inter;
    font-size: 18px;
    font-weight: 700;
    color: #888888;
}
</style>
