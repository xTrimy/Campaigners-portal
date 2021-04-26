<?php if(Permissions::getAccessLevel() > 0 ){ ?>

<div class="row">
    <div class="item">
        <h1>Status</h1>
        <?php
        $get_score = DB::query('SELECT u.id, c.name as cname, u.name,image,user_id, SUM(`point`) as total_points FROM points p, members u,committees c WHERE user_id = u.id AND c.id=u.committee_id GROUP BY user_id ORDER BY total_points DESC');
        $highest_score = 0;
        $my_score = 0;
        $user_high = 0;
        foreach ($get_score as $score) {
            if ($user_id == $score['user_id']) {
                $my_score = $score['total_points'];
            }
            if ($score['total_points'] > $highest_score) {
                $highest_score = $score['total_points'];
                $user_high = $score['user_id'];
            }
        }
        if ($my_score > 0)
            if ($user_id == $user_high) {
                echo "You're in the top of Campaigners' Leaderboard with a total score of <b>" . $highest_score . "</b><br> 
              Keep it up! 🔥🔥";
            } else if ($highest_score == $my_score) {
                echo "You're in the top of Campaigners' Leaderboard with a total score of <b>" . $highest_score . "</b><br> 
              Keep it up! 🔥🔥";
            } else {
                echo "You're away from the top of Campaigners' Leaderboard by <b>" . ($highest_score - $my_score) . "</b> points. Keep it up 💪";
            }
        else
            echo "Participate to earn points!"
        ?>
    </div>
    <div class="item" style="max-height:300px;">
        <h1>Top 10 Leaderboard</h1>

        <div>
            <table class="table">
                <tr>
                    <th>#</th>
                    <th>photo</th>
                    <th>name</th>
                    <th>committee</th>
                    <th>points</th>
                </tr>
                <?php
                $i = 1;
                foreach ($get_score as $score) {
                    if ($i == 11) {
                        break;
                    }
                ?>
                    <tr <?php if($user_id == $score['id']) echo "style='border:2px solid green;'" ?>>
                        <td><?php echo $i++; ?></td>
                        <td><img height="50px" src="uploads/<?php echo $score['image']; ?>"></td>
                        <td><a style="text-decoration:none;color:inherit" href="profile.php?id=<?php echo $score['user_id']; ?>"><?php echo ucfirst($score['name']); ?></a></td>
                        <td><?php echo $score['cname']; ?></td>
                        <td><?php echo $score['total_points']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>
<?php } ?>