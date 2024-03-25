<script>
import axios from "axios";
import MainHeader from "./components/MainHeader.vue";
import MainFooter from "./components/MainFooter.vue";

export default {
    data() {
        return {
            // Data properties for tweet creation
            tweetTitle: "",
            tweetContent: "",
            titleErrorMessage: "",
            contentErrorMessage: "",
        };
    },
    components: {
        MainHeader,
        MainFooter,
    },
    methods: {
        async postTweet() {
            // Reset error messages
            this.titleErrorMessage = "";
            this.contentErrorMessage = "";

            // Check if both title and content are filled
            if (!this.tweetTitle) {
                this.titleErrorMessage = "Bitte geben Sie den Titel ein.";
            }
            if (!this.tweetContent) {
                this.contentErrorMessage = "Bitte füllen Sie den Inhalt aus.";
            }

            if (!this.tweetTitle || !this.tweetContent) {
                return; // Stop further execution
            }

            try {
                // Send POST request to save the tweet
                const response = await axios.post("/api/tweets", {
                    title: this.tweetTitle,
                    content: this.tweetContent,
                });
                console.log("Tweet posted!", response.data);
                // Reset input fields after successful submission
                this.tweetTitle = "";
                this.tweetContent = "";

                // Redirect to all tweets page
                this.$router.push("/all/tweets");
            } catch (error) {
                console.error("Error posting tweet:", error);
                // Show a general error message if POST request fails
                this.titleErrorMessage =
                    "An error occurred while posting the tweet.";
            }
        },
    },
};
</script>

<template>
    <!-- MainHeader component import -->
    <MainHeader />

    <!-- Main content container -->
    <div class="container-main">
        <div class="content">
            <!-- Content row -->
            <div class="row">
                <!-- Heading -->
                <h2 class="heading">Tweet erstellen</h2>
                <!-- Form fields -->
                <div class="content-fields">
                    <!-- Title input field -->
                    <label for="tweetTitle" class="label">Title</label>
                    <input
                        type="text"
                        class="form-control"
                        id="tweetTitle"
                        v-model="tweetTitle"
                        placeholder="Tweet-Titel eingeben"
                    />
                    <!-- Error message for title field -->
                    <p class="error-message">{{ titleErrorMessage }}</p>

                    <!-- Content textarea -->
                    <label for="tweetContent" class="label">Inhalt</label>
                    <textarea
                        class="form-control-1"
                        id="tweetContent"
                        v-model="tweetContent"
                        placeholder="Schreiben Sie Ihren Tweet..."
                    ></textarea>
                    <!-- Error message for content field -->
                    <p class="error-message">{{ contentErrorMessage }}</p>

                    <!-- Button to submit the tweet -->
                    <button @click="postTweet" class="button">
                        Tweet speichern
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- MainFooter component import -->
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
    min-height: 484px;
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
    border: 1px 1px 1px 1px;
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
    border: 1px 1px 1px 1px;
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
    border-radius: 8px;
    opacity: 0px;
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
}

.button:hover {
    background-color: #0c7bb3;
    transform: scale(1.05);
}
.error-message {
    font-family: inter;
    color: red;
    font-size: 14px;
    font-weight: 600;
    padding: 0%;
    margin: 0%;
    visibility: visible;
    height: 20px;
}
</style>
