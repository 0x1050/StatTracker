# Data Extraction to CSV Format
In order to be able to write out data to a csv, you need to alter your user's permissions.
This is because `grant all` does not *really* mean ath privileges.
In order to write to a file, we need to use the command `grant file on 'table'.'database' to 'user'@'localhost'`

After that, you can write a file to anywhere on your server that the you have write permissions for.
You can do so with a command such as:
```
select A1, A2 from G1
into outfile '/srv/http/g1.csv'
fields terminated by ','
enclosed by '"'
lines terminated by '\n';
```

I just ran this on a database created by tablereset.php and got:

```
\N,"5",\N,\N,\N,"5",\N,\N,\N,"4","3","3","5","4","4","6","John","nhon"
"4",\N,\N,\N,"2",\N,"2","1","3","2","1","4",\N,\N,\N,"10","Mary","yram"
\N,\N,"1","2",\N,\N,"3","2","1",\N,\N,\N,"5","4","3","6","Michael","leahcim"
\N,"4",\N,"2",\N,\N,"2","1","3","1","1","2",\N,\N,\N,"5","Susan","nasus"
"3",\N,\N,\N,\N,"5","3","3","5",\N,\N,\N,"5","1","3","2","Chris","sirhc"
"4",\N,\N,\N,\N,"4","4","3","4",\N,\N,\N,"4","1","1","4","Karen","nerak"
"4",\N,\N,\N,"5",\N,"5","2","4","5","2","1",\N,\N,\N,"5","Brian","nairb"
"3",\N,\N,\N,\N,"5","5","1","1",\N,\N,\N,"3","4","4","10","Amanda","adnama"
\N,"2",\N,"2",\N,\N,"2","2","3","1","5","1",\N,\N,\N,"7","Edward","drawde"
\N,\N,"5",\N,"4",\N,\N,\N,\N,"2","3","5","3","4","4","1","Laura","arual"
\N,\N,"3",\N,"2",\N,\N,\N,\N,"4","4","4","1","3","3","10","Alex","xela"
```

This file can be easily interpreted by JavaScript.
In fact, we can turn this data into a 2D array using `String.split()` and `Array.map()`.
For example, after importing the file into a variable `csv`, with `rawFile.open()`:
```
function csv2array(csv) {
  rows = csv.split("\n"); //Split file into rows at newline

  return rows.map(function (row) {
  return row.split(",");  //Split rows into values at commas
  });
};
```

Any processing that needs to be done after that should be fairly trivial.
