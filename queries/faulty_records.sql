
DELETE from iita_shadetree.estimate_stderror where 
attribute_system like '%#%' or attribute_user like '%#%' or subgroup like '%#%' or tree_user like '%#%' or tree_system like '%#%';

select country, region, crop  from (
SELECT * FROM iita_shadetree.estimate_stderror_test2 where 
attribute_system like '%#%' or attribute_user like '%#%' or subgroup like '%#%' or tree_user like '%#%' or tree_system like '%#%'

) a 
group by country, region, crop;

