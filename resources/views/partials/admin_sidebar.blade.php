<div class="sidebar" style="position:fixed;top:0;left:0;width:250px;height:100vh;background:#ff7300;z-index:1000;display:flex;flex-direction:column;align-items:flex-start;padding:16px 20px;box-shadow:none;">
    <h3 style="color:#fff;font-family:'Montserrat', sans-serif;font-weight:700;margin-bottom:30px;font-size:1.5rem;">WarungAbdya</h3>
    <a href="{{ route('admin.dashboard') }}" title="Dashboard" style="margin-bottom:15px;display:flex;flex-direction:row;align-items:center;color:#fff;text-decoration:none;">
        <img src="https://img.icons8.com/material-outlined/24/ffffff/four-squares.png" style="margin-right:12px;width:32px;height:32px;"/>
        <span style="font-size:1rem;">Dashboard</span>
    </a>
    <a href="{{ route('admin.products.index') }}" title="Menu" style="margin-bottom:15px;display:flex;flex-direction:row;align-items:center;color:#fff;text-decoration:none;">
        <img src="https://img.icons8.com/ios-filled/24/ffffff/restaurant-menu.png" style="margin-right:12px;width:32px;height:32px;"/>
        <span style="font-size:1rem;">Menu</span>
    </a>
    <a href="{{ route('admin.reviews.index') }}" title="Review" style="margin-bottom:15px;display:flex;flex-direction:row;align-items:center;color:#fff;text-decoration:none;">
        <img src="https://img.icons8.com/material-outlined/24/ffffff/rating.png" style="margin-right:12px;width:32px;height:32px;"/>
        <span style="font-size:1rem;">Review</span>
    </a>
    <a href="{{ route('admin.orders.index') }}" title="Orders" style="margin-bottom:15px;display:flex;flex-direction:row;align-items:center;color:#fff;text-decoration:none;">
        <img src="https://img.icons8.com/material-outlined/24/ffffff/receipt.png" style="margin-right:12px;width:32px;height:32px;"/>
        <span style="font-size:1rem;">Orders</span>
    </a>
    <a href="{{ route('admin.users.index') }}" title="Userbase" style="margin-bottom:15px;display:flex;flex-direction:row;align-items:center;color:#fff;text-decoration:none;">
        <img src="https://img.icons8.com/material-outlined/24/ffffff/user-group-man-man.png" style="margin-right:12px;width:32px;height:32px;"/>
        <span style="font-size:1rem;">Userbase</span>
    </a>
    <form method="POST" action="{{ route('logout') }}" style="margin-top:auto;margin-bottom:15px;">
        @csrf
        <button type="submit" style="display:flex;flex-direction:row;align-items:center;color:#fff;text-decoration:none;font-size:1rem;background:none;border:none;cursor:pointer;">
            <img src="https://img.icons8.com/material-outlined/24/ffffff/exit.png" style="margin-right:12px;width:32px;height:32px;"/>
            <span style="font-size:1rem;">Logout</span>
        </button>
    </form>
</div>
<style>
body { padding-left: 250px !important; }
</style>
<!-- ADMIN_SIDEBAR_ACTIVE -->