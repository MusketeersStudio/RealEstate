import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { LeasePaymentComponent } from './lease-payment.component';

describe('LeasePaymentComponent', () => {
  let component: LeasePaymentComponent;
  let fixture: ComponentFixture<LeasePaymentComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ LeasePaymentComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(LeasePaymentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
