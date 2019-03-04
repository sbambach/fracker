--TEST--
Test for bug #1486: Crash on ZEND_SWITCH_LONG / ZEND_SWITCH_STRING (>= PHP 7.2, <= PHP 7.2.13)
--SKIPIF--
<?php
if (!version_compare(phpversion(), "7.2", '>=')) echo "skip >= PHP 7.2, <= PHP 7.2.13 needed\n";
if (!version_compare(phpversion(), "7.2.13", '<=')) echo "skip >= PHP 7.2, <= PHP 7.2.13 needed\n";
if (extension_loaded('zend opcache')) echo "skip opcache should not be loaded\n";
?>
--FILE--
<?php
include 'dump-branch-coverage.inc';

$foo = [38, 1, 17, 23];
xdebug_start_code_coverage(XDEBUG_CC_UNUSED | XDEBUG_CC_DEAD_CODE | XDEBUG_CC_BRANCH_CHECK );
include dirname( __FILE__ ) . '/bug01486-001.inc';
$cc = xdebug_get_code_coverage();
dump_branch_coverage($cc);
xdebug_stop_code_coverage();
?>
--EXPECTF--
foo 38
foo 1
foo 17
foo 23
{main}
- branches
  - 00; OP: 00-01; line: 02-02 HIT; out1: 02 HIT; out2: 368  X 
  - 02; OP: 02-02; line: 02-02 HIT; out1: 03 HIT; out2: 368 HIT
  - 03; OP: 03-05; line: 02-03 HIT; out1: 87  X ; out2: 94  X ; out3: 101  X ; out4: 108  X ; out5: 115  X ; out6: 122  X ; out7: 129  X ; out8: 136  X ; out9: 143  X ; out10: 150  X ; out11: 157  X ; out12: 164  X ; out13: 171  X ; out14: 178  X ; out15: 185  X ; out16: 192  X ; out17: 199  X ; out18: 206  X ; out19: 213  X ; out20: 220  X ; out21: 227  X ; out22: 234  X ; out23: 241  X ; out24: 248  X ; out25: 255  X ; out26: 262  X ; out27: 269  X ; out28: 276  X ; out29: 283  X ; out30: 290  X ; out31: 297  X ; out32: 304  X ; out33: 311  X ; out34: 318  X ; out35: 325  X ; out36: 332  X ; out37: 339  X ; out38: 346  X ; out39: 353  X ; out40: 360  X ; out41: 367  X ; out42: 06 HIT
  - 06; OP: 06-07; line: 04-04 HIT; out1: 08 HIT; out2: 87 HIT
  - 08; OP: 08-09; line: 05-05 HIT; out1: 10 HIT; out2: 94  X 
  - 10; OP: 10-11; line: 06-06 HIT; out1: 12 HIT; out2: 101  X 
  - 12; OP: 12-13; line: 07-07 HIT; out1: 14 HIT; out2: 108  X 
  - 14; OP: 14-15; line: 08-08 HIT; out1: 16 HIT; out2: 115  X 
  - 16; OP: 16-17; line: 09-09 HIT; out1: 18 HIT; out2: 122  X 
  - 18; OP: 18-19; line: 10-10 HIT; out1: 20 HIT; out2: 129  X 
  - 20; OP: 20-21; line: 11-11 HIT; out1: 22 HIT; out2: 136  X 
  - 22; OP: 22-23; line: 12-12 HIT; out1: 24 HIT; out2: 143  X 
  - 24; OP: 24-25; line: 13-13 HIT; out1: 26 HIT; out2: 150  X 
  - 26; OP: 26-27; line: 14-14 HIT; out1: 28 HIT; out2: 157  X 
  - 28; OP: 28-29; line: 15-15 HIT; out1: 30 HIT; out2: 164  X 
  - 30; OP: 30-31; line: 16-16 HIT; out1: 32 HIT; out2: 171  X 
  - 32; OP: 32-33; line: 17-17 HIT; out1: 34 HIT; out2: 178  X 
  - 34; OP: 34-35; line: 18-18 HIT; out1: 36 HIT; out2: 185  X 
  - 36; OP: 36-37; line: 19-19 HIT; out1: 38 HIT; out2: 192  X 
  - 38; OP: 38-39; line: 20-20 HIT; out1: 40 HIT; out2: 199 HIT
  - 40; OP: 40-41; line: 21-21 HIT; out1: 42 HIT; out2: 206  X 
  - 42; OP: 42-43; line: 22-22 HIT; out1: 44 HIT; out2: 213  X 
  - 44; OP: 44-45; line: 23-23 HIT; out1: 46 HIT; out2: 220  X 
  - 46; OP: 46-47; line: 24-24 HIT; out1: 48 HIT; out2: 227  X 
  - 48; OP: 48-49; line: 25-25 HIT; out1: 50 HIT; out2: 234  X 
  - 50; OP: 50-51; line: 26-26 HIT; out1: 52 HIT; out2: 241 HIT
  - 52; OP: 52-53; line: 27-27 HIT; out1: 54 HIT; out2: 248  X 
  - 54; OP: 54-55; line: 28-28 HIT; out1: 56 HIT; out2: 255  X 
  - 56; OP: 56-57; line: 29-29 HIT; out1: 58 HIT; out2: 262  X 
  - 58; OP: 58-59; line: 30-30 HIT; out1: 60 HIT; out2: 269  X 
  - 60; OP: 60-61; line: 31-31 HIT; out1: 62 HIT; out2: 276  X 
  - 62; OP: 62-63; line: 32-32 HIT; out1: 64 HIT; out2: 283  X 
  - 64; OP: 64-65; line: 33-33 HIT; out1: 66 HIT; out2: 290  X 
  - 66; OP: 66-67; line: 34-34 HIT; out1: 68 HIT; out2: 297  X 
  - 68; OP: 68-69; line: 35-35 HIT; out1: 70 HIT; out2: 304  X 
  - 70; OP: 70-71; line: 36-36 HIT; out1: 72 HIT; out2: 311  X 
  - 72; OP: 72-73; line: 37-37 HIT; out1: 74 HIT; out2: 318  X 
  - 74; OP: 74-75; line: 38-38 HIT; out1: 76 HIT; out2: 325  X 
  - 76; OP: 76-77; line: 39-39 HIT; out1: 78 HIT; out2: 332  X 
  - 78; OP: 78-79; line: 40-40 HIT; out1: 80 HIT; out2: 339  X 
  - 80; OP: 80-81; line: 41-41 HIT; out1: 82  X ; out2: 346 HIT
  - 82; OP: 82-83; line: 42-42  X ; out1: 84  X ; out2: 353  X 
  - 84; OP: 84-85; line: 43-43  X ; out1: 86  X ; out2: 360  X 
  - 86; OP: 86-86; line: 43-43  X ; out1: 367  X 
  - 87; OP: 87-93; line: 04-04 HIT; out1: 367 HIT
  - 94; OP: 94-100; line: 05-05  X ; out1: 367  X 
  - 101; OP: 101-107; line: 06-06  X ; out1: 367  X 
  - 108; OP: 108-114; line: 07-07  X ; out1: 367  X 
  - 115; OP: 115-121; line: 08-08  X ; out1: 367  X 
  - 122; OP: 122-128; line: 09-09  X ; out1: 367  X 
  - 129; OP: 129-135; line: 10-10  X ; out1: 367  X 
  - 136; OP: 136-142; line: 11-11  X ; out1: 367  X 
  - 143; OP: 143-149; line: 12-12  X ; out1: 367  X 
  - 150; OP: 150-156; line: 13-13  X ; out1: 367  X 
  - 157; OP: 157-163; line: 14-14  X ; out1: 367  X 
  - 164; OP: 164-170; line: 15-15  X ; out1: 367  X 
  - 171; OP: 171-177; line: 16-16  X ; out1: 367  X 
  - 178; OP: 178-184; line: 17-17  X ; out1: 367  X 
  - 185; OP: 185-191; line: 18-18  X ; out1: 367  X 
  - 192; OP: 192-198; line: 19-19  X ; out1: 367  X 
  - 199; OP: 199-205; line: 20-20 HIT; out1: 367 HIT
  - 206; OP: 206-212; line: 21-21  X ; out1: 367  X 
  - 213; OP: 213-219; line: 22-22  X ; out1: 367  X 
  - 220; OP: 220-226; line: 23-23  X ; out1: 367  X 
  - 227; OP: 227-233; line: 24-24  X ; out1: 367  X 
  - 234; OP: 234-240; line: 25-25  X ; out1: 367  X 
  - 241; OP: 241-247; line: 26-26 HIT; out1: 367 HIT
  - 248; OP: 248-254; line: 27-27  X ; out1: 367  X 
  - 255; OP: 255-261; line: 28-28  X ; out1: 367  X 
  - 262; OP: 262-268; line: 29-29  X ; out1: 367  X 
  - 269; OP: 269-275; line: 30-30  X ; out1: 367  X 
  - 276; OP: 276-282; line: 31-31  X ; out1: 367  X 
  - 283; OP: 283-289; line: 32-32  X ; out1: 367  X 
  - 290; OP: 290-296; line: 33-33  X ; out1: 367  X 
  - 297; OP: 297-303; line: 34-34  X ; out1: 367  X 
  - 304; OP: 304-310; line: 35-35  X ; out1: 367  X 
  - 311; OP: 311-317; line: 36-36  X ; out1: 367  X 
  - 318; OP: 318-324; line: 37-37  X ; out1: 367  X 
  - 325; OP: 325-331; line: 38-38  X ; out1: 367  X 
  - 332; OP: 332-338; line: 39-39  X ; out1: 367  X 
  - 339; OP: 339-345; line: 40-40  X ; out1: 367  X 
  - 346; OP: 346-352; line: 41-41 HIT; out1: 367 HIT
  - 353; OP: 353-359; line: 42-42  X ; out1: 367  X 
  - 360; OP: 360-366; line: 43-43  X ; out1: 367  X 
  - 367; OP: 367-367; line: 43-43 HIT; out1: 02 HIT
  - 368; OP: 368-369; line: 43-46 HIT; out1: EX  X 
- paths
  - 0 2 3 87 367 2 368:  X 
  - 0 2 3 94 367 2 368:  X 
  - 0 2 3 101 367 2 368:  X 
  - 0 2 3 108 367 2 368:  X 
  - 0 2 3 115 367 2 368:  X 
  - 0 2 3 122 367 2 368:  X 
  - 0 2 3 129 367 2 368:  X 
  - 0 2 3 136 367 2 368:  X 
  - 0 2 3 143 367 2 368:  X 
  - 0 2 3 150 367 2 368:  X 
  - 0 2 3 157 367 2 368:  X 
  - 0 2 3 164 367 2 368:  X 
  - 0 2 3 171 367 2 368:  X 
  - 0 2 3 178 367 2 368:  X 
  - 0 2 3 185 367 2 368:  X 
  - 0 2 3 192 367 2 368:  X 
  - 0 2 3 199 367 2 368:  X 
  - 0 2 3 206 367 2 368:  X 
  - 0 2 3 213 367 2 368:  X 
  - 0 2 3 220 367 2 368:  X 
  - 0 2 3 227 367 2 368:  X 
  - 0 2 3 234 367 2 368:  X 
  - 0 2 3 241 367 2 368:  X 
  - 0 2 3 248 367 2 368:  X 
  - 0 2 3 255 367 2 368:  X 
  - 0 2 3 262 367 2 368:  X 
  - 0 2 3 269 367 2 368:  X 
  - 0 2 3 276 367 2 368:  X 
  - 0 2 3 283 367 2 368:  X 
  - 0 2 3 290 367 2 368:  X 
  - 0 2 3 297 367 2 368:  X 
  - 0 2 3 304 367 2 368:  X 
  - 0 2 3 311 367 2 368:  X 
  - 0 2 3 318 367 2 368:  X 
  - 0 2 3 325 367 2 368:  X 
  - 0 2 3 332 367 2 368:  X 
  - 0 2 3 339 367 2 368:  X 
  - 0 2 3 346 367 2 368:  X 
  - 0 2 3 353 367 2 368:  X 
  - 0 2 3 360 367 2 368:  X 
  - 0 2 3 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 22 24 26 28 30 32 34 36 38 40 42 44 46 48 50 52 54 56 58 60 62 64 66 68 70 72 74 76 78 80 82 84 86 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 22 24 26 28 30 32 34 36 38 40 42 44 46 48 50 52 54 56 58 60 62 64 66 68 70 72 74 76 78 80 82 84 360 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 22 24 26 28 30 32 34 36 38 40 42 44 46 48 50 52 54 56 58 60 62 64 66 68 70 72 74 76 78 80 82 353 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 22 24 26 28 30 32 34 36 38 40 42 44 46 48 50 52 54 56 58 60 62 64 66 68 70 72 74 76 78 80 346 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 22 24 26 28 30 32 34 36 38 40 42 44 46 48 50 52 54 56 58 60 62 64 66 68 70 72 74 76 78 339 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 22 24 26 28 30 32 34 36 38 40 42 44 46 48 50 52 54 56 58 60 62 64 66 68 70 72 74 76 332 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 22 24 26 28 30 32 34 36 38 40 42 44 46 48 50 52 54 56 58 60 62 64 66 68 70 72 74 325 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 22 24 26 28 30 32 34 36 38 40 42 44 46 48 50 52 54 56 58 60 62 64 66 68 70 72 318 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 22 24 26 28 30 32 34 36 38 40 42 44 46 48 50 52 54 56 58 60 62 64 66 68 70 311 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 22 24 26 28 30 32 34 36 38 40 42 44 46 48 50 52 54 56 58 60 62 64 66 68 304 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 22 24 26 28 30 32 34 36 38 40 42 44 46 48 50 52 54 56 58 60 62 64 66 297 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 22 24 26 28 30 32 34 36 38 40 42 44 46 48 50 52 54 56 58 60 62 64 290 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 22 24 26 28 30 32 34 36 38 40 42 44 46 48 50 52 54 56 58 60 62 283 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 22 24 26 28 30 32 34 36 38 40 42 44 46 48 50 52 54 56 58 60 276 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 22 24 26 28 30 32 34 36 38 40 42 44 46 48 50 52 54 56 58 269 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 22 24 26 28 30 32 34 36 38 40 42 44 46 48 50 52 54 56 262 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 22 24 26 28 30 32 34 36 38 40 42 44 46 48 50 52 54 255 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 22 24 26 28 30 32 34 36 38 40 42 44 46 48 50 52 248 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 22 24 26 28 30 32 34 36 38 40 42 44 46 48 50 241 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 22 24 26 28 30 32 34 36 38 40 42 44 46 48 234 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 22 24 26 28 30 32 34 36 38 40 42 44 46 227 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 22 24 26 28 30 32 34 36 38 40 42 44 220 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 22 24 26 28 30 32 34 36 38 40 42 213 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 22 24 26 28 30 32 34 36 38 40 206 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 22 24 26 28 30 32 34 36 38 199 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 22 24 26 28 30 32 34 36 192 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 22 24 26 28 30 32 34 185 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 22 24 26 28 30 32 178 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 22 24 26 28 30 171 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 22 24 26 28 164 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 22 24 26 157 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 22 24 150 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 22 143 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 20 136 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 18 129 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 16 122 367 2 368:  X 
  - 0 2 3 6 8 10 12 14 115 367 2 368:  X 
  - 0 2 3 6 8 10 12 108 367 2 368:  X 
  - 0 2 3 6 8 10 101 367 2 368:  X 
  - 0 2 3 6 8 94 367 2 368:  X 
  - 0 2 3 6 87 367 2 368:  X 
  - 0 2 368:  X 
  - 0 368:  X
