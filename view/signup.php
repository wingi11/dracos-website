<div class="ui grid">
    <div class="row">
        <div class="three wide column"></div>
        <div class="eight wide column">
            <h1>Sign up</h1>
            <div class="ui placeholder segment">
                <div class="ui two column very relaxed stackable grid">
                    <div class="middle aligned column">
                        <a href="/login" class="ui big button">
                            Login
                            <i class="arrow right icon"></i>
                        </a>
                    </div>
                    <div class="column">
                        <form method="post" action="/signup" class="ui form">
                            <div class="field">
                                <label>Username</label>
                                <div class="ui left icon input">
                                    <input type="text" name="username" placeholder="Username">
                                    <i class="user icon"></i>
                                </div>
                            </div>
                            <div class="field">
                                <label>Email</label>
                                <div class="ui left icon input">
                                    <input type="text" name="email" placeholder="Email">
                                    <i class="mail icon"></i>
                                </div>
                            </div>
                            <div class="field">
                                <label>Password</label>
                                <div class="ui left icon input">
                                    <input type="password" name="password" placeholder="Password">
                                    <i class="lock icon"></i>
                                </div>
                            </div>
                            <div class="field">
                                <label>Repeat Password</label>
                                <div class="ui left icon input">
                                    <input type="password" name="password2" placeholder="Repeat Password">
                                    <i class="lock icon"></i>
                                </div>
                            </div>
                            <input type="submit" value="Sign Up" class="ui blue submit button"/>
                        </form>
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