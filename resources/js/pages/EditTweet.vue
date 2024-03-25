<script>
import axios from "axios";
import MainHeader from "./components/MainHeader.vue";
import MainFooter from "./components/MainFooter.vue";
export default {
    data() {
        return {
            editedTweet: {
                id: "",
                title: "",
                content: "",
            },
        };
    },
    components: {
        MainHeader,
        MainFooter,
    },
    mounted() {
        // Fetch tweet data when the component is mounted
        this.fetchTweet();
    },

    methods: {
        async fetchTweet() {
            const tweetId = this.$route.params.id;
            try {
                // Fetch tweet data from the API using the tweet ID
                const response = await axios.get(`/api/tweets/${tweetId}`);
                // Assign fetched tweet data to the editedTweet object
                this.editedTweet = response.data;
            } catch (error) {
                console.error("Error fetching tweet:", error);
            }
        },
        async updateTweet() {
            try {
                // Update the tweet data by sending a PUT request to the API
                const response = await axios.put(
                    `/api/tweets/${this.editedTweet.id}`,
                    this.editedTweet
                );
                console.log("Tweet updated:", response.data);
                // Redirect to the all tweets page after successful update
                this.$router.push("/all/tweets");
            } catch (error) {
                console.error("Error updating tweet:", error);
            }
        },
    },
};
</script>

<template>
    <MainHeader />

    <div class="container-main">
        <div class="content">
            <h2 class="heading">Tweet bearbeiten</h2>
            <form @submit.prevent="updateTweet">
                <!-- Title input -->

                <div class="content-fields">
                    <label for="editTitle" class="label">Title</label>
                    <input
                        type="text"
                        class="form-control"
                        id="editTitle"
                        v-model="editedTweet.title"
                        required
                    />
                    <!-- Content input -->

                    <label for="editContent" class="label">Inhalt</label>
                    <textarea
                        class="form-control-1"
                        id="editContent"
                        v-model="editedTweet.content"
                        required
                    ></textarea>

                    <!-- Submit button -->

                    <button type="submit" class="button">Tweet updaten</button>
                </div>
            </form>
        </div>
    </div>
    <MainFooter />
</template>

<style scoped>
.heading {
    font-family: Inter;
    font-size: 32px;
    font-weight: 700;
    line-height: 38.73px;
    text-align: left;
    padding-top: 50px;
    padding-bottom: 50px;
}
.content {
    min-width: 768px;
    min-height: 100%;
    display: flex;
    justify-content: center;
    flex-direction: column;
}
.container-main {
    min-width: 100%;
    min-height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.content-fields {
    padding-left: 40px;
    display: flex;
    flex-direction: column;
    width: 768px;
    min-height: 470px;
    border-radius: 4px;
    border: 1px;
    border: 1px solid #e8e8e8;
    background-color: rgb(255, 255, 255);
}
.label {
    padding-top: 35px;
    font-family: Inter;
    font-size: 24px;
    font-weight: 400;
    line-height: 29.05px;
    text-align: left;
    color: #444444;
}

.form-control {
    width: 715px;
    height: 46px;
    top: 392px;
    left: 412px;
    gap: 10px;
    border-radius: 4px 4px 4px 4px;
    font-family: Inter;
    font-size: 20px;
    font-weight: 400;
    line-height: 29.05px;
    text-align: left;
    padding-left: 10px;
}
.form-control-1 {
    width: 715px;
    height: 156px;
    border-radius: 4px 4px 4px 4px;
    font-family: Inter;
    font-size: 20px;
    font-weight: 400;
    line-height: 29.05px;
    text-align: left;
    padding-left: 10px;
    padding-top: 10px;
}
.button {
    width: 150px;
    height: 38px;
    border-radius: 8px 8px 8px 8px;
    background: #1d9bf0;
    font-family: Inter;
    font-size: 14px;
    font-weight: 400;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    margin-top: 18px;
    transition: background-color 0.3s;
    margin-top: 30px;
}

.button:hover {
    background-color: #0c7bb3;
    transform: scale(1.05);
}
</style>
