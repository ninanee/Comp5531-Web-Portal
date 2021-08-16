-- Trigger to notify negative account for Employer

delimiter $$

create trigger Employer_balance_check 
 before update on Employer for each row
  begin
       
       if new.Emoloyer_Balance< 0.00
       then set new.EmployerStatus = 'Suffering';
            set new.FrozenTime = curdate();
       
       else 
           set new.EmployerStatus = 'Normal';
           set new.FrozenTime = null;
   end if;
  end;
 
$$

delimiter ;

-- Trigger to notify negative account dor Candidate

delimiter $$

create trigger Candidate_balance_check 
 before update on Candidate for each row
  begin
       
       if new.Candidate_Balance < 0.00
       then set new.CandidateStatus = 'Suffering';
            set new.FrozenTime = curdate();
       
       else 
           set new.CandidateStatus = 'Normal';
           set new.FrozenTime = null;
   end if;
  end;
 
$$

delimiter ;



delimiter $$

create trigger Employer_Membership_Res 
 before insert on EmployerMembership for each row
  begin
       if new.Genre = 'Prime' AND new.MaxJobPost > 5 
       then signal SQLState'45000'set MESSAGE_TEXT = 'Employer can post up to five jobs.';
	   end if;
       
  end;
 
$$

delimiter ;


delimiter $$

create trigger Candidate_Membership_Res 
 before insert on CandidateMembership for each row
  begin
       if new.Genre = 'Prime' AND new.MaxJobApply > 5 
       then signal SQLState'45000'set MESSAGE_TEXT = 'Employee can view jobs as well as apply for up to five jobs.';
	   end if;
       
  end;
 
$$

delimiter ;