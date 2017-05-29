create table PATIENTS(
PID INT AUTO_INCREMENT PRIMARY KEY,
PNAME VARCHAR(200) NOT NULL,
AGE INT NOT NULL,
SEX CHAR NOT NULL,
DOCID INT,
WARDID INT,
DISEASEID INT,
LABTESTID INT,
phone varchar(40),
FOREIGN KEY(DOCID) REFERENCES Doctors(DOCID),
FOREIGN KEY(WARDID) REFERENCES BED(BEDID),
FOREIGN KEY(DISEASEID) REFERENCES DISEASE(DISID),
FOREIGN KEY(LABTESTID) REFERENCES LABTEST(TESTID)
)