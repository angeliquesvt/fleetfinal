<?php

class Vote{
    private function recordExist($ref, $ref_id){

    }
    public function like($db, $ref, $ref_id, $user_id){
        $req = $db->query("SELECT * FROM $ref WHERE id=?",[$ref_id]);
        if($req->rowCount()>0){
            $vote_row= $db->query("SELECT id, vote FROM votes WHERE ref= ? AND ref_id=? AND user_id= ?",[$ref, $ref_id, $user_id ])->fetch();
            if($vote_row){
                if($vote_row->vote == 1){
                    $unvote= $db->query("DELETE FROM votes WHERE user_id = ?",[$user_id]);
                    $unvote = $db->query("UPDATE $ref SET like_count = like_count - 1 WHERE id=$ref_id");
                    return true;
                }
            }
            $req = $db->query("INSERT INTO votes SET ref= ?, ref_id=?, user_id= ?, created_at= NOW(), vote= 1",[$ref, $ref_id, $user_id ]);
            $req = $db->query("UPDATE $ref SET like_count = like_count + 1 WHERE id=$ref_id");
            return true;
        }else{
            throw new Exception("Impossible de voter pour un enrgistrement qui n'existe pas");
        }
    }

    // Permet d'ajouter les class like au moment ou enregistrer
    public static function getClass($vote){
        if($vote){
            if($vote->vote == 1){
                echo 'is-liked';
                return true;
            }
        }
        return null;
    }

    public function updateCount($db, $ref, $ref_id){
        $votes = $db->query("SELECT COUNT(id) as count, vote FROM votes WHERE ref=? AND ref_id=? GROUP BY vote",[$ref, $ref_id])->fetchAll();
        $like = 0;
        $counts = [
            '1' =>0
        ];
        foreach($votes as $vote) {
            $counts[$vote->vote] = $vote->count;
        }
    $req = $db->query("UPDATE $ref SET like_count = {$counts[1]} WHERE id= $ref_id");
    return true;
}
}

?>