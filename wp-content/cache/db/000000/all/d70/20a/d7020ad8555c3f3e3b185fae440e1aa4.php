©NHV<?php exit; ?>a:6:{s:10:"last_error";s:0:"";s:10:"last_query";s:473:"
			SELECT pm.meta_value AS price, pm2.meta_value AS special_price
			FROM wp_posts AS p
			INNER JOIN wp_postmeta AS pm ON pm.post_id = p.id AND pm.meta_key = '_wpsc_price'
			INNER JOIN wp_postmeta AS pm2 ON pm2.post_id = p.id AND pm2.meta_key = '_wpsc_special_price'
			INNER JOIN wp_postmeta AS pm3 ON pm3.post_id = p.id AND pm3.meta_key = '_wpsc_stock' AND pm3.meta_value != '0'

			WHERE
				p.post_type = 'wpsc-product'
				AND
				p.post_parent = 4645
		";s:11:"last_result";a:0:{}s:8:"col_info";a:2:{i:0;O:8:"stdClass":13:{s:4:"name";s:5:"price";s:5:"table";s:2:"pm";s:3:"def";s:0:"";s:10:"max_length";i:0;s:8:"not_null";i:0;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:0;s:4:"blob";i:1;s:4:"type";s:4:"blob";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}i:1;O:8:"stdClass":13:{s:4:"name";s:13:"special_price";s:5:"table";s:3:"pm2";s:3:"def";s:0:"";s:10:"max_length";i:0;s:8:"not_null";i:0;s:11:"primary_key";i:0;s:12:"multiple_key";i:0;s:10:"unique_key";i:0;s:7:"numeric";i:0;s:4:"blob";i:1;s:4:"type";s:4:"blob";s:8:"unsigned";i:0;s:8:"zerofill";i:0;}}s:8:"num_rows";i:0;s:10:"return_val";i:0;}