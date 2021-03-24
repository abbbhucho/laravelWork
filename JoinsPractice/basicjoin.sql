From icloudEMS project
```
select * from `exam_courses` as B 
join `exam_classes` as u 
on u.id = B.class_id 
where `class_name`='MBA SEM V' AND `academic_year_start`='2018' AND `academic_year_end`='2021' AND `division`='A'
```

