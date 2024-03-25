<template>
    <footer class="footer">
        <p class="footer-text">Mini-Twitter built with Laravel</p>
        <p class="footer-text">© Muhammad Talha Khan</p>
    </footer>
</template>

<style scoped>
.footer {
    background-color: rgb(255, 255, 255);
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 48px;
}

.footer-text {
    margin-left: 30px;
    margin-right: 30px;
    font-family: Inter;
    font-size: 16px;
    font-weight: 400;
    color: #222222;
}
</style>
