<div class="sidebar" style="position:fixed;top:0;left:0;width:180px;height:100vh;background:#ff7300;z-index:1000;display:flex;flex-direction:column;align-items:flex-start;padding:16px 20px;box-shadow:none;">
    <h3 style="color:#fff;font-family:'Montserrat', sans-serif;font-weight:700;margin-bottom:30px;font-size:1.5rem;">WarungAbdya</h3>
    <a href="{{ route('profile.show') }}" title="Profile" style="margin-bottom:25px;display:flex;flex-direction:row;align-items:center;color:#fff;text-decoration:none;">
        <img src="https://img.icons8.com/ios-filled/24/ffffff/user-male-circle.png" style="margin-right:10px;width:24px;height:24px;"/>
        <span style="font-size:0.9rem;">Profile</span>
    </a>
    <a href="/home" title="Home" style="margin-bottom:25px;display:flex;flex-direction:row;align-items:center;color:#fff;text-decoration:none;">
        <img src="https://img.icons8.com/ios-filled/24/ffffff/home.png" style="margin-right:10px;width:24px;height:24px;"/>
        <span style="font-size:0.9rem;">Home</span>
    </a>
    <a href="/menu" title="Menu" style="margin-bottom:25px;display:flex;flex-direction:row;align-items:center;color:#fff;text-decoration:none;">
        <img src="https://img.icons8.com/ios-filled/24/ffffff/restaurant-menu.png" style="margin-right:10px;width:24px;height:24px;"/>
        <span style="font-size:0.9rem;">Menu</span>
    </a>
    <a href="#" title="Favorites" style="margin-bottom:25px;display:flex;flex-direction:row;align-items:center;color:#fff;text-decoration:none;">
        <img src="https://img.icons8.com/ios-filled/24/ffffff/like.png" style="margin-right:10px;width:24px;height:24px;"/>
        <span style="font-size:0.9rem;">Favourites</span>
    </a>
    <form method="POST" action="{{ route('logout') }}" style="margin-top:auto;margin-bottom:20px;">
        @csrf
        <button type="submit" style="display:flex;flex-direction:row;align-items:center;color:#fff;text-decoration:none;font-size:0.9rem;background:none;border:none;cursor:pointer;">
            <img src="https://img.icons8.com/material-outlined/24/ffffff/exit.png" style="margin-right:10px;width:24px;height:24px;"/>
            <span style="font-size:0.9rem;">Logout</span>
        </button>
    </form>
</div>
<style>
body { padding-left: 180px !important; }
</style>
<!-- USER_SIDEBAR_ACTIVE --> 