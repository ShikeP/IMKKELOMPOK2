<div class="bottom-nav">
    <a href="#"><img src="https://img.icons8.com/ios-filled/50/aaaaaa/speech-bubble--v1.png">Live Chat</a>
    <a href="{{ route('profile.show') }}"><img src="https://img.icons8.com/ios-filled/50/aaaaaa/user-male-circle.png">Profile</a>
    <a href="/home" class="{{ request()->is('home') || request()->is('/') ? 'active' : '' }}"><img src="https://img.icons8.com/ios-filled/50/{{ request()->is('home') || request()->is('/') ? 'ff7300' : 'aaaaaa' }}/home.png">Home</a>
    <a href="/menu" class="{{ request()->is('menu') ? 'active' : '' }}"><img src="https://img.icons8.com/ios-filled/50/{{ request()->is('menu') ? 'ff7300' : 'aaaaaa' }}/restaurant-menu.png">Menu</a>
    <a href="#"><img src="https://img.icons8.com/ios-filled/50/aaaaaa/like.png">Favorites</a>
</div>
<style>
.bottom-nav {
    position: fixed;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 100%;
    max-width: 420px;
    background: #fff;
    border-top: 1px solid #eee;
    display: flex;
    justify-content: space-around;
    align-items: center;
    height: 60px;
    z-index: 10;
}
</style> 