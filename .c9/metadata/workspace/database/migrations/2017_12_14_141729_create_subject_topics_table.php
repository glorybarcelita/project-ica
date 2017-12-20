{"filter":false,"title":"2017_12_14_141729_create_subject_topics_table.php","tooltip":"/database/migrations/2017_12_14_141729_create_subject_topics_table.php","ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":20,"column":37},"end":{"row":20,"column":37},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":41,"mode":"ace/mode/php"}},"hash":"da0b76d9fd1dac964b11aa35297826053a3bbb1b","undoManager":{"mark":26,"position":26,"stack":[[{"start":{"row":16,"column":37},"end":{"row":17,"column":0},"action":"insert","lines":["",""],"id":2},{"start":{"row":17,"column":0},"end":{"row":17,"column":12},"action":"insert","lines":["            "]}],[{"start":{"row":17,"column":12},"end":{"row":20,"column":37},"action":"insert","lines":["$table->unsignedInteger('ica_subject_id');","            $table->foreign('ica_subject_id')->references('id')->on('ica_subjects')->onDelete('cascade');","            $table->string('topic_title');","            $table->longtext('note');"],"id":3}],[{"start":{"row":17,"column":40},"end":{"row":17,"column":41},"action":"remove","lines":["_"],"id":4}],[{"start":{"row":17,"column":39},"end":{"row":17,"column":40},"action":"remove","lines":["a"],"id":5}],[{"start":{"row":17,"column":38},"end":{"row":17,"column":39},"action":"remove","lines":["c"],"id":6}],[{"start":{"row":17,"column":37},"end":{"row":17,"column":38},"action":"remove","lines":["i"],"id":7}],[{"start":{"row":18,"column":29},"end":{"row":18,"column":43},"action":"remove","lines":["ica_subject_id"],"id":8},{"start":{"row":18,"column":29},"end":{"row":18,"column":39},"action":"insert","lines":["subject_id"]}],[{"start":{"row":18,"column":68},"end":{"row":18,"column":69},"action":"remove","lines":["_"],"id":10}],[{"start":{"row":18,"column":67},"end":{"row":18,"column":68},"action":"remove","lines":["a"],"id":11}],[{"start":{"row":18,"column":66},"end":{"row":18,"column":67},"action":"remove","lines":["c"],"id":12}],[{"start":{"row":18,"column":65},"end":{"row":18,"column":66},"action":"remove","lines":["i"],"id":13}],[{"start":{"row":18,"column":72},"end":{"row":18,"column":73},"action":"remove","lines":["s"],"id":14}],[{"start":{"row":18,"column":72},"end":{"row":18,"column":73},"action":"insert","lines":["s"],"id":15,"ignore":true}],[{"start":{"row":20,"column":37},"end":{"row":21,"column":0},"action":"insert","lines":["",""],"id":16},{"start":{"row":21,"column":0},"end":{"row":21,"column":12},"action":"insert","lines":["            "]}],[{"start":{"row":21,"column":12},"end":{"row":22,"column":103},"action":"insert","lines":["$table->unsignedInteger('user_id');","            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->nullable();"],"id":17}],[{"start":{"row":22,"column":101},"end":{"row":22,"column":102},"action":"remove","lines":[")"],"id":18}],[{"start":{"row":22,"column":100},"end":{"row":22,"column":101},"action":"remove","lines":["("],"id":19}],[{"start":{"row":22,"column":99},"end":{"row":22,"column":100},"action":"remove","lines":["e"],"id":20}],[{"start":{"row":22,"column":98},"end":{"row":22,"column":99},"action":"remove","lines":["l"],"id":21}],[{"start":{"row":22,"column":97},"end":{"row":22,"column":98},"action":"remove","lines":["b"],"id":22}],[{"start":{"row":22,"column":96},"end":{"row":22,"column":97},"action":"remove","lines":["a"],"id":23}],[{"start":{"row":22,"column":95},"end":{"row":22,"column":96},"action":"remove","lines":["l"],"id":24}],[{"start":{"row":22,"column":94},"end":{"row":22,"column":95},"action":"remove","lines":["l"],"id":25}],[{"start":{"row":22,"column":93},"end":{"row":22,"column":94},"action":"remove","lines":["u"],"id":26}],[{"start":{"row":22,"column":92},"end":{"row":22,"column":93},"action":"remove","lines":["n"],"id":27}],[{"start":{"row":22,"column":91},"end":{"row":22,"column":92},"action":"remove","lines":[">"],"id":28}],[{"start":{"row":22,"column":90},"end":{"row":22,"column":91},"action":"remove","lines":["-"],"id":29}]]},"timestamp":1513322299848}