<!DOCTYPE html>
<!-- Generated by PHPWord -->
<html>
<head>
<meta charset="UTF-8" />
<title>PHPWord</title>
<meta name="author" content="Oni" />
<style>
* {font-family: Arial; font-size: 11pt;}
a.NoteRef {text-decoration: none;}
hr {height: 1px; padding: 0; margin: 1em 0; border: 0; border-top: 1px solid #CCC;}
table {border: 1px solid black; border-spacing: 0px; width : 100%;}
td {border: 1px solid black;}
.Normal {margin-bottom: 10pt;}
h5 {font-family: 'Times New Roman'; font-size: 10pt; font-weight: bold;}
.Heading 5 Char {font-family: 'Times New Roman'; font-size: 10pt; font-weight: bold;}
.Normal (Web) {font-family: 'Times New Roman'; font-size: 12pt;}
</style>
</head>
<body>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Arial'; color: #000000; font-weight: bold;">Firstly </span><span style="font-family: 'Arial'; color: #000000;">:</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Arial'; color: #000000;">composer</span><span style="font-family: 'Arial'; color: #000000;"> update --ignore-platform-</span><span style="font-family: 'Arial'; color: #000000;">reqs</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Arial'; color: #000000;">composer</span><span style="font-family: 'Arial'; color: #000000;"> dump-</span><span style="font-family: 'Arial'; color: #000000;">autoload</span><span style="font-family: 'Arial'; color: #000000;"> --ignore-platform-</span><span style="font-family: 'Arial'; color: #000000;">reqs</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10pt; color: #24292F;">php</span><span style="font-family: 'Courier New'; font-size: 10pt; color: #24292F;"> artisan migrate</span></p>
<p style="margin-bottom: 0pt;">	</p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Arial'; color: #000000; font-weight: bold;">Secondly:</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Arial'; color: #000000;">If you want to override</span><span style="font-family: 'Arial'; color: #000000;">  the</span><span style="font-family: 'Arial'; color: #000000;"> role  override the seeds file</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Arial'; color: #000000;">seeders</span><span style="font-family: 'Arial'; color: #000000;">-&gt; ConnectRelationshipsSeeder.php</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #9CDCFE;">$</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #9CDCFE;">roleAdmin</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;"> = </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #DCDCAA;">config</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">(</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">roles.models.role</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">)::</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #DCDCAA;">where</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">(</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;name&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">, </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;=&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">, </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;Admin&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">)-&gt;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #DCDCAA;">first</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">();</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Arial'; color: #000000;">Override the name is equal to roles table name which you want to make</span><span style="font-family: 'Arial'; color: #000000;">  as</span><span style="font-family: 'Arial'; color: #000000;"> admin</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Arial'; color: #000000;">seeders</span><span style="font-family: 'Arial'; color: #000000;">-&gt; RolesTableSeeder.php</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;"> </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #9CDCFE;">$</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #9CDCFE;">RoleItems</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;"> = [</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">            [</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">                </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">name</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">        =&gt; </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;Admin&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">,</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">                </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">slug</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">        =&gt; </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;admin&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">,</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">                </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">description</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;"> =&gt; </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;Admin Role&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">,</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">                </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">level</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">       =&gt; </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #B5CEA8;">5</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">,</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">            ],</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">            [</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">                </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">name</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">        =&gt; </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;User&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">,</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">                </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">slug</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">        =&gt; </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;user&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">,</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">                </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">description</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;"> =&gt; </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;User Role&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">,</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">                </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">level</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">       =&gt; </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #B5CEA8;">1</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">,</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">            ],</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">            [</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">                </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">name</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">        =&gt; </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;Unverified&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">,</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">                </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">slug</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">        =&gt; </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;unverified&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">,</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">                </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">description</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;"> =&gt; </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;Unverified Role&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">,</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">                </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">level</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">       =&gt; </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #B5CEA8;">0</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">,</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">            ],</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">        ];</span></p>
<p>&nbsp;</p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Arial'; color: #000000;">Change the roles as you want.</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Arial'; color: #000000;">Seeders -&gt; PermissionsTableSeeder.php</span></p>
<p>&nbsp;</p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Arial'; color: #000000;">Create permission items as you want to seed</span></p>
<p>&nbsp;</p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;"> </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #9CDCFE;">$</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #9CDCFE;">Permissionitems</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;"> = [</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">            [</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">                </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">name</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">        =&gt; </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;Can View Users&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">,</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">                </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">slug</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">        =&gt; </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">view.users</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">,</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">                </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">description</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;"> =&gt; </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;Can view users&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">,</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">                </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">model</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">       =&gt; </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;Permission&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">,</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">            ],</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">            [</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">                </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">name</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">        =&gt; </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;Can Create Users&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">,</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">                </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">slug</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">        =&gt; </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">create.users</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">,</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">                </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">description</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;"> =&gt; </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;Can create new users&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">,</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">                </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">model</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">       =&gt; </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;Permission&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">,</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">            ],</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">            [</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">                </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">name</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">        =&gt; </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;Can Edit Users&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">,</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">                </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">slug</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">        =&gt; </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">edit.users</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">,</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">                </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">description</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;"> =&gt; </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;Can edit users&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">,</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">                </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">model</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">       =&gt; </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;Permission&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">,</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">            ],</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">            [</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">                </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">name</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">        =&gt; </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;Can Delete Users&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">,</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">                </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">slug</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">        =&gt; </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">delete.users</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">,</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">                </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">description</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;"> =&gt; </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;Can delete users&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">,</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">                </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">model</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">       =&gt; </span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">&#039;Permission&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">,</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">            ],</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #D4D4D4;">        ];</span></p>
<p>&nbsp;</p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Arial'; color: #000000;">Copy everything same file on seeds folder files</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Arial'; color: #000000; font-weight: bold;">Thirdly:</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10pt; color: #24292F;">php</span><span style="font-family: 'Courier New'; font-size: 10pt; color: #24292F;"> artisan </span><span style="font-family: 'Courier New'; font-size: 10pt; color: #24292F;">db:seed</span></p>
<p>&nbsp;</p>
<p style="margin-bottom: 12pt;"><span style="font-family: 'Arial'; font-size: 9pt; color: #24292F; font-weight: bold;">Using NPM:</span></p>
<p style="margin-top: 0; margin-bottom: 0;"><span style="font-family: 'Arial'; font-size: 12pt; color: #24292F;">From the projects root folder run </span></p>
<p style="margin-top: 0; margin-bottom: 0;"><span style="font-family: 'Courier New'; font-size: 10pt; color: #24292F;">npm</span></p>
<p style="margin-top: 0; margin-bottom: 0;"><span style="font-family: 'Courier New'; font-size: 10pt; color: #24292F;"> install</span></p>

<p style="margin-top: 0; margin-bottom: 0;"><span style="font-family: 'Arial'; font-size: 12pt; color: #24292F;">From the projects root folder run </span></p>
<p style="margin-top: 0; margin-bottom: 0;"><span style="font-family: 'Courier New'; font-size: 10pt; color: #24292F;">npm</span></p>
<p style="margin-top: 0; margin-bottom: 0;"><span style="font-family: 'Courier New'; font-size: 10pt; color: #24292F;"> run dev</span></p>
<p style="margin-top: 0; margin-bottom: 0;"><span style="font-family: 'Arial'; font-size: 12pt; color: #24292F;"> or </span></p>
<p style="margin-top: 0; margin-bottom: 0;"><span style="font-family: 'Courier New'; font-size: 10pt; color: #24292F;">npm</span></p>
<p style="margin-top: 0; margin-bottom: 0;"><span style="font-family: 'Courier New'; font-size: 10pt; color: #24292F;"> run production</span></p>

<p style="margin-top: 0; margin-bottom: 0;"><span style="font-family: 'Arial'; font-size: 12pt; color: #24292F;">You can watch assets with </span></p>
<p style="margin-top: 0; margin-bottom: 0;"><span style="font-family: 'Courier New'; font-size: 10pt; color: #24292F;">npm</span></p>
<p style="margin-top: 0; margin-bottom: 0;"><span style="font-family: 'Courier New'; font-size: 10pt; color: #24292F;"> run watch</span></p>

<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10pt; color: #24292F;">php</span><span style="font-family: 'Courier New'; font-size: 10pt; color: #24292F;"> artisan </span><span style="font-family: 'Courier New'; font-size: 10pt; color: #24292F;">config:cache</span></p>
<p style="margin-bottom: 12pt;"><br />
</p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10pt; color: #24292F;">Enable 2 factor </span><span style="font-family: 'Courier New'; font-size: 10pt; color: #24292F;">authentication</span><span style="font-family: 'Courier New'; font-size: 10pt; color: #24292F;"> in .</span><span style="font-family: 'Courier New'; font-size: 10pt; color: #24292F;">env</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">LARAVEL_2STEP_ENABLED=true</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">LARAVEL_2STEP_DATABASE_CONNECTION=</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">mysql</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">LARAVEL_2STEP_DATABASE_TABLE=laravel2step</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">LARAVEL_2STEP_USER_MODEL=App\Models\User</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">LARAVEL_2STEP_EMAIL_FROM=</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">LARAVEL_2STEP_EMAIL_FROM_NAME=&quot;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">Laravel</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;"> 2 Step Verification&quot;</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">LARAVEL_2STEP_EMAIL_SUBJECT=&#039;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">Laravel</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;"> 2 Step Verification&#039;</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">LARAVEL_2STEP_EXCEEDED_COUNT=3</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">LARAVEL_2STEP_EXCEEDED_COUNTDOWN_MINUTES=1440</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">LARAVEL_2STEP_VERIFIED_LIFETIME_MINUTES=360</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">LARAVEL_2STEP_RESET_BUFFER_IN_SECONDS=300</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">LARAVEL_2STEP_CSS_FILE=&quot;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">css</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">/laravel2step/app.css&quot;</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">LARAVEL_2STEP_APP_CSS_ENABLED=false</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">LARAVEL_2STEP_APP_CSS=&quot;</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">css</span><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">/app.css&quot;</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">LARAVEL_2STEP_BOOTSTRAP_CSS_CDN_ENABLED=true</span></p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10.5pt; color: #CE9178;">LARAVEL_2STEP_BOOTSTRAP_CSS_CDN=&quot;https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css&quot;</span></p>
<p>&nbsp;</p>
<p style="margin-bottom: 0pt;"><span style="font-family: 'Courier New'; font-size: 10pt; color: #24292F;">You can find social </span><span style="font-family: 'Courier New'; font-size: 10pt; color: #24292F;">loggin</span><span style="font-family: 'Courier New'; font-size: 10pt; color: #24292F;"> settings in .</span><span style="font-family: 'Courier New'; font-size: 10pt; color: #24292F;">env</span><span style="font-family: 'Courier New'; font-size: 10pt; color: #24292F;"> file</span></p>
<p>&nbsp;</p>
</body>
</html>
<?php /**PATH D:\laragon\www\bundler\resources\views/pdf/lDNLHepUyDtrm1MOdnfcDpDWDaLOtjYrHIU4XzeF.blade.php ENDPATH**/ ?>