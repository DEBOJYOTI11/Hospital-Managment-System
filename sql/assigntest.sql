create table ASSIGNTEST(
PID INT,
LABTESTID INT,
SCHEDULETIME VARCHAR(200),
SCHEDULEDATE VARCHAR(200),
RESULT VARCHAR(2000),
FOREIGN KEY(PID) REFERENCES PATIENTS(PID) ON DELETE CASCADE,
FOREIGN KEY(LABTESTID) REFERENCES LABTEST(TESTID)  ON DELETE CASCADE
) 