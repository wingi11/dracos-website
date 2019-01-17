<div class="ui grid">
    <div class="row">
        <div class="three wide column"></div>
        <div class="eight wide column">
            <h1>Login</h1>
            <div class="ui placeholder segment">
                <div class="ui two column very relaxed stackable grid">
                    <div class="column">
                        <form method="post" action="/login" class="ui form">
                            <div class="field">
                                <label>Username</label>
                                <div class="ui left icon input">
                                    <input name="username" type="text" placeholder="Username">
                                    <i class="user icon"></i>
                                </div>
                            </div>
                            <div class="field">
                                <label>Password</label>
                                <div class="ui left icon input">
                                    <input name="password" type="password" placeholder="Password">
                                    <i class="lock icon"></i>
                                </div>
                            </div>
                            <input type="submit" value="Login" class="ui blue submit button"/>
                        </form>
                    </div>
                    <div class="middle aligned column">
                        <a href="/signup" class="ui big button">
                            <i class="signup icon"></i>
                            Sign Up
                        </a>
                    </div>
                </div>
                <div class="ui vertical divider">
                    Or
                </div>
            </div>
        </div>
        <div class="three wide column"></div>
    </div>
</div>
