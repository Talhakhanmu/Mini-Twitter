<template>
    <header class="header">
        <router-link to="/all/tweets" class="logo" exact>
            <h2 class="logotext">MINI-TWITTER</h2>
        </router-link>
        <div id="app">
            <div class="main-navi">
                <div class="navi">
                    <router-link to="/all/tweets" class="navigation" exact>
                        Meine Tweets
                    </router-link>
                    <router-link
                        to="/all/tweets"
                        class="underline-box"
                        v-show="isAllTweetsRoute"
                        exact
                    ></router-link>
                </div>
                <router-link to="/tweets/create" class="create-tweet">
                    +Tweet erstellen
                </router-link>
            </div>
            <router-view></router-view>
        </div>
    </header>
</template>

<script>
export default {
    computed: {
        isAllTweetsRoute() {
            return this.$route.path === "/all/tweets";
        },
    },
};
</script>

<style scoped>
.header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    height: 104px;
    background: #ffffff;
    border-bottom: 1px solid #f1f1f1;
}
.logo {
    height: 104px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-left: 156px;
    text-decoration: none;
}
.logotext {
    font-family: Inter;
    font-size: 28px;
    font-weight: 900;
    line-height: 29.05px;
    letter-spacing: -0.02em;
    text-align: left;
    color: #000000;
}
.navigation {
    display: flex;
    cursor: pointer;
    font-family: inter;
    font-size: 18px;
    font-weight: 700;
    line-height: 21.78px;
    text-align: center;
    color: #000000;
    margin-bottom: 5px;
    text-decoration: none;
}
.create-tweet {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 180px;
    height: 39px;
    font-size: 18px;
    gap: 10px;
    border-radius: 50px;
    font-family: Inter;
    background: #1d9bf0;
    color: #f1f1f1;
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.3s, transform 0.2s;
}

.create-tweet:hover {
    background-color: #0c7bb3;
    transform: scale(1.05);
}
.main-navi {
    align-items: center;
    width: 400px;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    margin-right: 156px;
    align-items: center;
}
.navi {
    display: flex;
    flex-direction: column;
}

/* Underline box styles */
.underline-box {
    width: 100%;
    height: 2px;
    background-color: #000000;
    display: none; /* Initially hide the underline box */
}

.main-navi .underline-box {
    display: block;
}
</style>
