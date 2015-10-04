lock table deptree write, pomodoro write;
        select
                @mylft := lft,
                @myrgt := rgt,
                @mywdt := rgt - lft + 1
                from deptree 
                where ix = '1'
                and subix = '7'
                and username = '1'
        ;
        delete
                from pomodoro
                using deptree inner join pomodoro
                where deptree.lft between @mylft and @myrgt
                and pomodoro.ix = deptree.ix
                and pomodoro.subix = deptree.subix
                and pomodoro.username = deptree.username
        ;
        delete
                from deptree
                where lft between @mylft and @myrgt
        ;
        update
                deptree
                set rgt = rgt - @mywdt
                where rgt > @myrgt
        ;
        update
                deptree
                set lft = lft - @mywdt
                where lft > @myrgt
        ;
unlock tables;
